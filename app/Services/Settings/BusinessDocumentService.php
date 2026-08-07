<?php

namespace App\Services\Settings;

use App\Models\BusinessDocument;
use App\Services\Documents\OfficeDocumentConverter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Handles file operations for business owner documents.
 *
 * Manages the full lifecycle of personal/VAT-related documents: uploading files
 * to local storage, downloading, inline previewing, and deleting both the file
 * and database record.
 *
 * Files are stored in storage/app/business-documents/ with unique timestamped names.
 */
class BusinessDocumentService
{
    public function __construct(
        private OfficeDocumentConverter $officeConverter
    ) {}

    public function upload(UploadedFile $file, array $data): BusinessDocument
    {
        $filename = $this->generateFilename($file);
        $path     = $file->storeAs('business-documents', $filename, 'local');

        return BusinessDocument::create([
            'name'        => $data['name'],
            'file_path'   => $path,
            'notes'       => $data['notes'] ?? null,
            'uploaded_at' => now(),
        ]);
    }

    public function delete(BusinessDocument $document): void
    {
        if ($document->file_path && Storage::exists($document->file_path)) {
            $this->officeConverter->forgetPreview(Storage::path($document->file_path));
            Storage::delete($document->file_path);
        }

        $document->delete();
    }

    public function download(BusinessDocument $document): StreamedResponse
    {
        $this->abortIfMissing($document);

        $filename = $document->name . '.' . $document->file_extension;

        return Storage::download($document->file_path, $filename);
    }

    public function preview(BusinessDocument $document): BinaryFileResponse
    {
        $this->abortIfMissing($document);

        $path     = Storage::path($document->file_path);
        $preview  = $this->officeConverter->resolvePreview($path, $document->file_extension);
        $filename = $document->name . '.' . $preview['extension'];

        return response()->file($preview['path'], [
            'Content-Type'           => $preview['mimeType'],
            'Content-Disposition'    => 'inline; filename="' . $filename . '"',
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control'          => 'private, no-store',
        ]);
    }

    private function abortIfMissing(BusinessDocument $document): void
    {
        if (!$document->file_path || !Storage::exists($document->file_path)) {
            abort(404);
        }
    }

    private function generateFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $timestamp = time();
        $random    = bin2hex(random_bytes(8));

        return "bdoc-{$timestamp}-{$random}.{$extension}";
    }
}
