<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('image_url')) {
    /**
     * Get image URL with fallback from storage to public folder.
     *
     * Priority:
     * 1. Storage (storage/app/public/{path}) - for production uploads
     * 2. Public (public/{path}) - for development/static assets
     *
     * @param string|null $path The image path (e.g., "clients/logo.png")
     * @param string|null $placeholder Fallback placeholder if image doesn't exist
     * @return string The resolved image URL
     */
    function image_url(?string $path, ?string $placeholder = null): string
    {
        if (empty($path)) {
            return $placeholder ? asset($placeholder) : asset('assets/img/placeholder.png');
        }

        // Check if file exists in storage first
        if (Storage::disk('public')->exists($path)) {
            return Storage::url($path);
        }

        // Fallback to public folder
        $publicPath = public_path($path);
        if (file_exists($publicPath)) {
            return asset($path);
        }

        // Return placeholder if neither exists
        return $placeholder ? asset($placeholder) : asset('assets/img/placeholder.png');
    }
}

if (!function_exists('image_exists')) {
    /**
     * Check if an image exists in either storage or public folder.
     *
     * @param string|null $path The image path
     * @return bool
     */
    function image_exists(?string $path): bool
    {
        if (empty($path)) {
            return false;
        }

        return Storage::disk('public')->exists($path) || file_exists(public_path($path));
    }
}
