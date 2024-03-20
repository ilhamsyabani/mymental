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
                        <form action="{{ route('order-update', ['order' => $order->id]) }}" method="POST" class="mt-12">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="zoom_link" class="block text-gray-700">Link Zoom</label>
                                <input value="{{ $order->zoom_link }}" id="zoom_link" type="text" name="zoom_link"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('zoom_link') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            {{-- <div class="mb-4">
                                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Link Gambar Sampul</label>
                                <input value="{{ $order->image }}" id="image" type="text" name="image"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Konten Artikel</label>
                                <input type="hidden" name="content" id="content">
                                <trix-editor input="content">{{ $order->content }}</trix-editor>
                                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div> --}}

                            <button type="submit" class="block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Update</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
