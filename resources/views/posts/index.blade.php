<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <!-- component -->
    <x-blog.layout>
        <x-blog.filter />

        <x-blog.post-card />
        <x-blog.post-card />
        <x-blog.post-card />

        <x-blog.pagination />

        <x-slot:sidebar>
            <x-blog.authors-card />
            <x-blog.recent-card />
        </x-slot>
    </x-blog.layout>
</x-app-layout>
