<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

class Posts
{
    public static function init(): Posts
    {
        return new self();
    }

    public function create($data, $isPostImport = false) {
        $data['slug'] = Str::slug($data['title']).'-'.time();
        $data['user_id'] = $isPostImport ? $this->getAdminId() : auth()->id();
        return Post::create($data);
    }

    public function getAdminId() {
        return User::whereEmail(config('settings.admin-user.email'))->first()->id;
    }
}
