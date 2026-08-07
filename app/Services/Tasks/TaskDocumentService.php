<?php

namespace App\Services\Tasks;

use App\Models\Task;
use App\Models\TaskDocument;
use App\Services\Documents\OfficeDocumentConverter;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Handles the full lifecycle of documents attached to tasks.
 *
 * Files are stored in `storage/app/task-documents/` with unique
 * timestamped names to avoid collisions.
 */
class TaskDocumentService
{
    public function __construct(
        private OfficeDocumentConverter $officeConverter
    ) {}

    /**
     * Upload a document for a task
     */
    public function upload(Task $task, UploadedFile $file, array $data): TaskDocument
    {
        $filename = $this->generateFilename($file);
        $path = $file->storeAs('task-documents', $filename, 'local');

        return $task->taskDocuments()->create([
            'name'        => $data['name'],
            'file_path'   => $path,
            'uploaded_at' => now(),
            'notes'       => $data['notes'] ?? null,
        ]);
    }

    /**
     * Delete document and physical file
     */
    public function delete(TaskDocument $document): void
    {
        if ($document->file_path && Storage::exists($document->file_path)) {
            $this->officeConverter->forgetPreview(Storage::path($document->file_path));
            Storage::delete($document->file_path);
        }

        $document->delete();
    }

    /**
     * Download document
     */
    public function download(TaskDocument $document): StreamedResponse
    {
        if (!$this->exists($document)) {
            abort(404, __('task_documents.not_found'));
        }

        $filename = $document->name . '.' . $document->file_extension;

        return Storage::download($document->file_path, $filename);
    }

    /**
     * Preview document inline
     */
    public function preview(TaskDocument $document): BinaryFileResponse
    {
        if (!$this->exists($document)) {
            abort(404, __('task_documents.not_found'));
        }

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

    /**
     * Check if the document file exists in storage
     */
    private function exists(TaskDocument $document): bool
    {
        return $document->file_path && Storage::exists($document->file_path);
    }

    /**
     * Generate a unique filename to avoid collisions
     */
    private function generateFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        $timestamp = time();
        $random    = bin2hex(random_bytes(8));

        return "taskdoc-{$timestamp}-{$random}.{$extension}";
    }
}
