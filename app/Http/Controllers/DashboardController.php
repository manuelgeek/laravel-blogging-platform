<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view-posts', ['only' => ['index']]);
    }

    public function index($username = null)
    {
        $posts = Post::latest()->whereHas('user', function ($q) use ($username) {
            return $q->when($username, function ($q) use ($username){
                return $q->whereUsername($username);
            }, function ($q){
                return $q->whereId(auth()->id());
            });
        })->paginate(config('settings.pagination', 15));
        return view('dashboard')->withPosts($posts);
    }
}
