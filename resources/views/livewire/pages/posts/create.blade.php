<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public string $title = '';
    public string $content = '';
    public $image;

    // DITAMBAH: Properti untuk field baru
    public string $excerpt = '';
    public $published_at = null; // Bisa null untuk draft

    public function savePost()
    {
        // dd($this->all());
        $validated = $this->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'content' => 'required|string',
            'image' => 'required|max:2048',
            'excerpt' => 'required|string|max:255', // Tambahkan validasi excerpt
            'published_at' => 'nullable|date', // Tambahkan validasi tanggal
        ]);

        $validated['image'] = $this->image->store('posts', 'public');
        $validated['user_id'] = Auth::id();
        $validated['slug'] = Str::slug($this->title); // Buat slug otomatis

        Post::create($validated);

        session()->flash('status', 'Artikel baru berhasil disimpan.');
        return $this->redirect(route('posts-index'));
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Tulis Artikel Baru') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                <header class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Formulir Artikel</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Buat dan publikasikan artikel baru.</p>
                </header>

                <form wire:submit.prevent="savePost" class="mt-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-1 space-y-6">
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Gambar Sampul</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Gunakan gambar yang relevan.
                                </p>
                                <label for="image" class="cursor-pointer">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" alt="Preview Gambar"
                                            class="w-full aspect-video object-cover rounded-lg shadow-md">
                                    @else
                                        <div
                                            class="w-full aspect-video border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg flex flex-col items-center justify-center text-center text-gray-500">
                                            <span class="font-semibold">Klik untuk mengunggah</span>
                                        </div>
                                    @endif
                                </label>
                                <input id="image" wire:model="image" type="file" class="sr-only">
                                @error('image')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <x-input-label for="published_at" :value="__('Tanggal Publikasi (Opsional)')" />
                                <x-text-input wire:model.defer="published_at" id="published_at" type="datetime-local"
                                    class="mt-1 block w-full" />
                                <p class="text-xs text-gray-500 mt-1">Kosongkan untuk menyimpan sebagai draft.</p>
                                <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                            </div>
                        </div>

                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <x-input-label for="title" :value="__('Judul Artikel')" />
                                <x-text-input wire:model="title" id="title" type="text" class="mt-1 block w-full"
                                    required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="excerpt" :value="__('Ringkasan (Excerpt)')" />
                                <textarea wire:model="excerpt" id="excerpt" rows="3"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm"
                                    placeholder="Tulis ringkasan singkat artikel di sini..."></textarea>
                                <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                            </div>

                            <div wire:ignore x-data="{ value: @entangle('content') }" x-init="let trixEditor = document.getElementById('content');
                            let trixElement = document.querySelector('trix-editor');
                            trixElement.editor.loadHTML(value);
                            trixElement.addEventListener('trix-change', event => {
                                value = event.target.value;
                            });">
                                <x-input-label for="content" :value="__('Konten Lengkap Artikel')" />
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content" class="mt-1 trix-content"></trix-editor>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>

                        </div>
                    </div>

                    <div
                        class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('posts-index') }}" wire:navigate
                            class="w-full md:w-auto justify-center inline-flex items-center p-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>
                        <x-primary-button class="w-full md:w-auto justify-center">Publikasikan
                            Artikel</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
