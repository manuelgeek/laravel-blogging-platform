<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>
    <!-- component -->
    <div>
        <!-- component -->
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <div class="pt-6">
                <div class=" bg-white rounded-md px-6 py-10 max-w-2xl mx-auto">
                    <div class="space-y-4">
                        <div>
                            <label for="title" class="text-lx">Title</label>
                            <input type="text" name="title" placeholder="title" id="title" class="outline-none bg-indigo-50 py-1 px-2 text-md border rounded-md w-full @error('title') border-red-500 @enderror" value="{{old('title')}}" />
                            @error('title')
                                <span class="text-red-500" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                            <label for="description" class="block mb-2 text-lg">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="write here..." class="w-full  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md @error('description') border-red-500 @enderror">{{old('description')}}</textarea>
                            @error('description')
                            <span class="text-red-500" role="alert">
                                    {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class=" px-6 py-2 mx-auto block rounded-md bg-green-600  text-white">Create Post</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
