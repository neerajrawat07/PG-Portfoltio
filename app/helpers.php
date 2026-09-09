<?php

if (! function_exists('img_url')) {
    /**
     * Return a public URL for a stored image, normalising all known path variants:
     *   - 'testimonials/xx.jpg'                    (DB canonical)
     *   - 'storage/testimonials/xx.jpg'             (legacy prefix)
     *   - 'storage/app/public/testimonials/xx.jpg'  (full server path)
     */
    function img_url(?string $path, string $default = ''): string
    {
        if (empty($path)) {
            return $default ?: asset('images/placeholder.png');
        }

        // Already an absolute URL — return as-is.
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Normalise directory separators to forward slashes.
        $path = str_replace('\\', '/', $path);

        // Strip the longest matching prefix first.
        foreach ([
            'storage/app/public/',
            'app/public/',
            'storage/',
        ] as $prefix) {
            if (str_starts_with($path, $prefix)) {
                $path = substr($path, strlen($prefix));
                break;
            }
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}
