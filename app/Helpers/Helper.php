<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class Helper
{
    static function readableDate($date): string
    {
        return $date !== null ? Carbon::parse($date)->format('j M, Y') : '';
    }

    static function previewText($text): string
    {
        return Str::words($text, 30);
    }
}
