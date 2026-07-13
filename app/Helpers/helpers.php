<?php

if (!function_exists('image_url')) {
    /**
     * Resolve a stored image path into a full public URL.
     *
     * Handles all storage conventions used across the project:
     *  - External URLs (http/https/data:) → returned as-is
     *  - Paths starting with "storage/" or "uploads/" → asset($path)
     *  - Bare relative paths (e.g. "courses/img.jpg") → asset("storage/$path")
     */
    function image_url(?string $path, ?string $fallback = null): ?string
    {
        if (empty($path)) {
            return $fallback;
        }

        if (preg_match('/^(https?:\/\/|data:)/i', $path)) {
            return $path;
        }

        if (preg_match('/^(storage\/|uploads\/)/', $path)) {
            return asset($path);
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}
