@props(['post'])
<div class="mt-6">
    <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-start"><span class="font-light text-gray-600">{{\App\Helpers\Helper::readableDate($post->created_at)}}</span>
        </div>
        <div class="mt-2"><a href="{{route('post.show', $post->slug)}}" class="text-2xl font-bold text-gray-700 hover:underline">{{$post->title}}</a>
            <p class="mt-2 text-gray-600">{{\App\Helpers\Helper::previewText($post->description)}}</p>
        </div>
        <div class="flex items-center justify-between mt-4">
            <a href="{{route('post.show', $post->slug)}}" class="text-blue-500 hover:underline">Read more</a>
            <div><a href="{{route('dashboard', $post->user->username)}}" class="flex items-center">
                    <x-blog.avatar />
                    <h1 class="font-bold text-gray-700 hover:underline">{{$post->user->name}}</h1>
                </a></div>
        </div>
    </div>
</div>
