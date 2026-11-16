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

        return asset('images/'.static::served($path));
    }

    /**
     * width="…" height="…" for an <img>, read from the file, so the browser can reserve
     * the space before the photo arrives (no layout shift). Empty if the file is missing.
     */
    public static function dimensions(string $path): string
    {
        static $cache = [];

        $size = $cache[$path] ??= @getimagesize(public_path('images/'.static::served($path))) ?: null;

        return $size ? sprintf('width="%d" height="%d"', $size[0], $size[1]) : '';
    }

    /** The file actually served for a path: its WebP copy if one exists. */
    protected static function served(string $path): string
    {
        $webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $path);

        return $webp !== $path && is_file(public_path('images/'.$webp)) ? $webp : $path;
    }
}
