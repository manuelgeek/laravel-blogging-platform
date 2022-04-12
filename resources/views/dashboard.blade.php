<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>


    <x-blog.layout>
        <x-blog.post-card />
        <x-blog.post-card />
        <x-blog.post-card />

        <x-blog.pagination />

        <x-slot:sidebar>
            <x-blog.panel />
        </x-slot>
    </x-blog.layout>

</x-app-layout>
