<?php

namespace App\Services;

use App\Jobs\PostImport;
use Illuminate\Support\Facades\Http;

class PostsImport
{
    public static function init(): PostsImport
    {
        return new self();
    }

    public function handleImports()
    {
        $response = Http::get(config('settings.posts-import-url'));
        foreach ($response->object()->data as $post) {
            PostImport::dispatch($post);
        }
    }
}
