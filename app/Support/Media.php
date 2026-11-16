<?php

namespace App\Support;

/**
 * Photos are stored as a JPG plus a smaller WebP copy beside it. Pages show the WebP;
 * social cards (og:image) keep the JPG, which every link-preview crawler can read.
 */
class Media
{
    /** URL of the WebP copy of a public/images path if one exists, otherwise the file itself. */
    public static function url(string $path): string
    {
        $webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $path);

        return asset('images/'.($webp !== $path && is_file(public_path('images/'.$webp)) ? $webp : $path));
    }
}
