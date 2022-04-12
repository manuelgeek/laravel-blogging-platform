<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div>
        <!-- component -->
        <form>
            <div class="pt-6">
                <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="text-lx">Title:</label>
                            <input type="text" placeholder="title" id="title" class="ml-2 outline-none bg-indigo-50 py-1 px-2 text-md border rounded-md w-full" />
                        </div>
                        <div>
                            <label for="description" class="block mb-2 text-lg">Description:</label>
                            <textarea id="description" cols="30" rows="10" placeholder="whrite here.." class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md"></textarea>
                        </div>
                        <button class=" px-6 py-2 mx-auto block rounded-md bg-green-600  text-white">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
