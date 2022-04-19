@props(['authors'])
<div class="px-8">
    <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
    <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
        <ul class="-mx-4">
            @foreach($authors as $author)
            <li class="flex items-center mt-3">
                <x-blog.avatar />
                <p><a href="{{route('dashboard', $author->username)}}" class="font-bold text-gray-700 hover:underline">
                        {{$author->name}}
                    </a> <br>
                    <span
                        class="text-sm font-light text-gray-700">Created {{$author->posts()->count()}} Posts</span></p>
            </li>
            @endforeach
        </ul>
    </div>
</div>
