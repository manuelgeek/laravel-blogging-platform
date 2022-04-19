<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create-posts', ['only' => ['create', 'store']]);
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::when(request()->has('filter'), function ($q) {
            return @request()->filter === 'latest' ? $q->latest() : $q->oldest();
        }, function ($q) {
            return $q->latest();
        })->paginate(config('settings.pagination', 15));
        $authors = User::role(config('settings.user_types.user'))->take(5)->get();
        $recentPosts = Post::latest()->take(3)->get();
        return view('posts.index')->withPosts($posts)->withAuthors($authors)->withRecentPosts($recentPosts);
    }

    public function show(Post $post): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('posts.create');
    }

    public function store(PostRequest $request): \Illuminate\Http\RedirectResponse
    {
        (new Posts())->create($request->all());
        notify()->success('Post created successfully');
        return to_route('dashboard');
    }
}
