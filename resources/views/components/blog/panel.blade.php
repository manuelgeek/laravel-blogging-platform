<div class="px-8 mt-6">
    <h1 class="mb-4 text-xl font-bold text-gray-700">Action panel</h1>
    <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
        <div class="mt-4">
            <span class="flex items-center">
                <x-blog.avatar />
                <p><a href="{{route('dashboard', auth()->user()->username)}}" class="mx-1 font-bold text-gray-700 hover:underline">{{auth()->user()->name}}</a>
                    <br>
                    <span
                        class="text-sm font-light text-gray-700">Created {{auth()->user()->posts()->count()}} Posts</span></p>
            </span>
        </div>
        @can('create-posts')
        <a href="{{route('post.create')}}" class="px-2 py-1 font-bold text-gray-100 bg-green-600 rounded hover:bg-green-500 mt-4 text-center">Create Post</a>
        @endcan
    </div>
</div>
