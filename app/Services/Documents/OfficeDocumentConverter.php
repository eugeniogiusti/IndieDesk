<?php

namespace App\Services\Documents;

use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory as SpreadsheetIOFactory;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpWord\Settings as WordSettings;

/**
 * Converts Word (.docx) and Excel (.xlsx/.xls) documents to PDF for inline
 * preview, using PHPWord/PhpSpreadsheet rendered through Dompdf. Converted
 * files are cached in storage/app/previews so each document is only
 * converted once.
 */
class OfficeDocumentConverter
{
    private const WORD_EXTENSIONS = ['docx'];

    private const SPREADSHEET_EXTENSIONS = ['xls', 'xlsx'];

    public function isConvertible(string $extension): bool
    {
        $extension = strtolower($extension);

        return in_array($extension, [...self::WORD_EXTENSIONS, ...self::SPREADSHEET_EXTENSIONS], true);
    }

    /**
     * Resolve the best file to serve for inline preview. Converts
     * convertible Office documents to PDF; falls back to the original
     * file (same extension/mime as today) if conversion isn't applicable
     * or fails.
     *
     * @return array{path: string, mimeType: string, extension: string}
     */
    public function resolvePreview(string $absolutePath, string $extension): array
    {
        $extension = strtolower($extension);

        if ($this->isConvertible($extension)) {
            $pdfPath = $this->convert($absolutePath, $extension);

            if ($pdfPath !== null) {
                return ['path' => $pdfPath, 'mimeType' => 'application/pdf', 'extension' => 'pdf'];
            }
        }

        return ['path' => $absolutePath, 'mimeType' => mime_content_type($absolutePath), 'extension' => $extension];
    }

    /**
     * Remove the cached PDF preview for a document that's about to be
     * deleted, so converted files don't accumulate on disk forever.
     */
    public function forgetPreview(string $absolutePath): void
    {
        $cachedPath = $this->cachedPdfPath($absolutePath);

        if (file_exists($cachedPath)) {
            unlink($cachedPath);
        }
    }

    private function convert(string $absolutePath, string $extension): ?string
    {
        $cachedPath = $this->cachedPdfPath($absolutePath);

        if (file_exists($cachedPath)) {
            return $cachedPath;
        }

        try {
            if (in_array($extension, self::WORD_EXTENSIONS, true)) {
                $this->convertWord($absolutePath, $cachedPath);
            } else {
                $this->convertSpreadsheet($absolutePath, $cachedPath);
            }
        } catch (\Throwable $e) {
            Log::warning('Office preview conversion failed', [
                'file' => $absolutePath,
                'error' => $e->getMessage(),
            ]);

            return null;
        }

        return file_exists($cachedPath) ? $cachedPath : null;
    }

    private function convertWord(string $source, string $destination): void
    {
        WordSettings::setPdfRendererName(WordSettings::PDF_RENDERER_DOMPDF);
        WordSettings::setPdfRendererPath(base_path('vendor/dompdf/dompdf'));

        $document = WordIOFactory::load($source);
        WordIOFactory::createWriter($document, 'PDF')->save($destination);
    }

    private function convertSpreadsheet(string $source, string $destination): void
    {
        $spreadsheet = SpreadsheetIOFactory::load($source);
        SpreadsheetIOFactory::createWriter($spreadsheet, 'Dompdf')->save($destination);
    }

    private function cachedPdfPath(string $absolutePath): string
    {
        $dir = storage_path('app/previews');

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        return $dir . '/' . pathinfo($absolutePath, PATHINFO_FILENAME) . '.pdf';
    }
}
