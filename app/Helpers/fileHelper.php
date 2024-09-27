<?php
namespace App\Helpers;

use Illuminate\Support\Facades\URL;

class FileHelper
{
    public static function generateTemporarySignedUrl($path)
    {
        return URL::signedRoute('private.file', ['path' => $path], now()->addMinute());
    }
}
