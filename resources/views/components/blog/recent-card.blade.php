@props(['recentPosts'])

<div class="px-8 mt-10">
    <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
    @foreach($recentPosts as $post)
    <div class="flex flex-col max-w-sm p-4 mx-auto bg-white rounded-lg shadow-md mt-4">
        <div class="mt-4"><a href="{{route('post.show', $post->slug)}}" class="text-base font-medium text-gray-700 hover:underline">{{$post->title}}</a></div>
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <x-blog.avatar />
                <a href="{{route('dashboard', $post->user->username)}}" class="text-sm text-gray-700 hover:underline">{{$post->user->name}}</a></div><span
                class="text-sm font-light text-gray-600">{{\App\Helpers\Helper::readableDate($post->created_at)}}</span>
        </div>
    </div>
    @endforeach
</div>
