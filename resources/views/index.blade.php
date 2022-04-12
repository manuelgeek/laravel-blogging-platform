<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div class="overflow-x-hidden bg-gray-100 py">

        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-end">
                        <div>
                            <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Latest</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                    </div>
                    <x-blog.post-card />
                    <x-blog.post-card />
                    <x-blog.post-card /><div class="mt-8">
                    <div class="flex">
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                                previous
                            </a>

                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                1
                            </a>

                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                2
                            </a>

                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                3
                            </a>

                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    <x-blog.authors-card />
                    <x-blog.recent-card />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
