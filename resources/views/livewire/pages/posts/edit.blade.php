<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="max-w-full flex justify-between items-center mt-4 mb-8">
                        <h4 class=" text-lg font-semibold">Edit Artikel</h4>
                    </div>
                    <div>
                        <form action="{{ route('post-update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data" class="mt-12">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700">Judul</label>
                                <input value="{{ $post->title }}" id="title" type="text" name="title"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Link Gambar Sampul</label>
                                <input value="{{ $post->image }}" id="image" type="text" name="image"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Konten Artikel</label>
                                <input type="hidden" name="content" id="content">
                                <trix-editor input="content">{{ $post->content }}</trix-editor>
                                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Update</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
