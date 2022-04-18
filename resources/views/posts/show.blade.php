<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>


    <x-blog.layout>
        <div class="mt-6">
            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-start">
                    <span class="font-light text-gray-600">{{\App\Helpers\Helper::readableDate($post->created_at)}}</span>
                </div>
                <div class="mt-2">
                    <p class="mt-2 text-gray-600">{!! $post->description !!}</p>
                </div>
            </div>
        </div>


        <x-slot:sidebar>
            <x-blog.single-panel :post="$post" />
        </x-slot>
    </x-blog.layout>

</x-app-layout>
