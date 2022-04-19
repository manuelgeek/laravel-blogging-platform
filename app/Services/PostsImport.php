<?php

namespace App\Services;

use App\Jobs\PostImport;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PostsImport
{
    public static function init(): PostsImport
    {
        return new self();
    }

    public function handleImports()
    {
        $response = Http::get(config('settings.posts-import-url'));
        if($response->failed()) {
            Log::error('request error');
            return;
        }
        foreach ($response->object()->data as $post) {
            PostImport::dispatch($post);
        }
    }
}
