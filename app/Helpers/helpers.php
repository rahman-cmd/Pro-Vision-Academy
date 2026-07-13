<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

if (!function_exists('image_url')) {
    /**
     * Resolve a stored image path into a full public URL.
     *
     * Handles all storage conventions used across the project:
     *  - External URLs (http/https/data:) → returned as-is
     *  - Paths starting with "storage/" → asset($path)
     *  - Files already under public/ (uploads/, images/, …) → asset($path)
     *  - Public disk paths (e.g. "courses/x.jpg", "speakers/x.png")
     *    → asset("storage/$path")
     */
    function image_url(?string $path, ?string $fallback = null): ?string
    {
        if (empty($path)) {
            return $fallback;
        }

        if (preg_match('/^(https?:\/\/|data:)/i', $path)) {
            return $path;
        }

        $path = ltrim($path, '/');

        if (str_starts_with($path, 'storage/')) {
            return '/' . $path;
        }

        // Files saved directly under public/ (uploads, images, css assets, etc.)
        if (file_exists(public_path($path))) {
            return '/' . $path;
        }

        // Storage::disk('public')->store(...) paths
        return '/storage/' . $path;
    }
}

if (!function_exists('store_public_upload')) {
    /**
     * Store an uploaded file on the public disk and return the relative path for the DB.
     */
    function store_public_upload(UploadedFile $file, string $directory): string
    {
        return $file->store(trim($directory, '/'), 'public');
    }
}

if (!function_exists('delete_public_upload')) {
    /**
     * Delete a previously stored upload from public/ or the public disk.
     */
    function delete_public_upload(?string $path): void
    {
        if (empty($path) || preg_match('/^(https?:\/\/|data:)/i', $path)) {
            return;
        }

        $path = ltrim($path, '/');

        // Legacy: files written directly into public/uploads
        if (str_starts_with($path, 'uploads/') && file_exists(public_path($path))) {
            @unlink(public_path($path));
            return;
        }

        // Legacy DB values like "storage/gallery/x.png"
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
