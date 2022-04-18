@props(['post'])

<div class="px-8 mt-6">
    <h1 class="mb-4 text-xl font-bold text-gray-700">Action panel</h1>
    <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
        <div class="mt-4">
            <span class="flex items-center">
                <x-blog.avatar />
                <p><a href="{{route('dashboard', $post->user->username)}}" class="font-bold text-gray-700 hover:underline">{{$post->user->name}}</a>
                    <br>
                    <span
                        class="text-sm font-light text-gray-700">Created {{$post->user->posts()->count()}} Posts</span></p>
            </span>
        </div>
        @can('edit-posts')
            <a href="#" class="px-2 py-1 font-bold text-gray-100 bg-blue-600 rounded hover:bg-blue-500 mt-4 text-center">Edit Post</a>
        @endcan
        @can('delete-posts')
            <a href="#" class="px-2 py-1 font-bold text-gray-100 bg-red-600 rounded hover:bg-red-500 mt-4 text-center">Edit Post</a>
        @endcan
    </div>
</div>
