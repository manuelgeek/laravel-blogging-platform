<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <!-- component -->
    <x-blog.layout>
        <x-blog.filter />

        @forelse($posts as $post)
            <x-blog.post-card :post="$post" />
        @empty
            <x-blog.no-posts />
        @endforelse

        <x-blog.pagination :posts="$posts" />

        <x-slot:sidebar>
            @if($authors->count())
                <x-blog.authors-card :authors="$authors" />
            @endif
            <x-blog.recent-card :recentPosts="$recentPosts" />
        </x-slot>
    </x-blog.layout>
</x-app-layout>
