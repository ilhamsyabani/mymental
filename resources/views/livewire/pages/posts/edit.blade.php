<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Carbon\Carbon;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public Post $post; // Menampung model Post yang dikirim dari route

    // Properti form
    public string $title;
    public string $content;
    public string $excerpt;
    public ?string $published_at = null;
    
    public $newImage; // Untuk gambar BARU
    public $existingImage; // Untuk path gambar LAMA

    /**
     * Method mount() dijalankan saat komponen dimuat.
     * Secara otomatis mengisi form dengan data dari post yang ada.
     */
    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->excerpt = $post->excerpt ?? '';
        $this->existingImage = $post->image;
        
        // Format tanggal agar sesuai dengan input datetime-local
        $this->published_at = $post->published_at ? Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : null;
    }

    /**
     * Menyimpan perubahan data artikel ke database.
     */
    public function updatePost()
    {
        $validated = $this->validate([
            // Aturan 'unique' diubah agar mengabaikan post ini sendiri
            'title' => ['required', 'string', 'max:255', Rule::unique('posts')->ignore($this->post->id)],
            'content' => 'required|string|min:50',
            'newImage' => 'nullable|image|max:2048', // Gambar baru tidak wajib
            'excerpt' => 'required|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        // Cek jika ada gambar baru yang diunggah
        if ($this->newImage) {
            // Hapus gambar lama jika ada
            if ($this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
            // Simpan gambar baru
            $validated['image'] = $this->newImage->store('posts', 'public');
        }
        unset($validated['newImage']);
        
        // Update slug jika judul berubah
        $validated['slug'] = Str::slug($this->title);

        // Update record di database
        $this->post->update($validated);

        session()->flash('status', 'Artikel berhasil diperbarui.');
        return $this->redirect(route('posts-index'));
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Artikel') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                <header class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Formulir Edit Artikel</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Ubah detail artikel di bawah ini.</p>
                </header>

                <form wire:submit.prevent="updatePost" class="mt-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-1 space-y-6">
                            <div>
                                <h4 class="font-semibold text-gray-700 dark:text-gray-300">Gambar Sampul</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Klik untuk mengganti gambar.</p>
                                <label for="image-upload" class="cursor-pointer group">
                                    <div class="relative">
                                        {{-- Logika untuk menampilkan preview gambar baru atau gambar lama --}}
                                        @if ($newImage)
                                            <img src="{{ $newImage->temporaryUrl() }}" alt="Preview" class="w-full aspect-video object-cover rounded-lg shadow-md">
                                        @elseif ($existingImage)
                                            <img src="{{ asset('storage/' . $existingImage) }}" alt="Gambar saat ini" class="w-full aspect-video object-cover rounded-lg shadow-md">
                                        @endif
                                        <div class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                            <span class="font-semibold">Ganti Gambar</span>
                                        </div>
                                    </div>
                                </label>
                                <input id="image-upload" wire:model="newImage" type="file" class="sr-only">
                                @error('newImage') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <x-input-label for="published_at" :value="__('Tanggal Publikasi (Opsional)')" />
                                <x-text-input wire:model.defer="published_at" id="published_at" type="datetime-local" class="mt-1 block w-full" />
                                <p class="text-xs text-gray-500 mt-1">Kosongkan untuk menyimpan sebagai draft.</p>
                                <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                            </div>
                        </div>

                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <x-input-label for="title" :value="__('Judul Artikel')" />
                                <x-text-input wire:model="title" id="title" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="excerpt" :value="__('Ringkasan (Excerpt)')" />
                                <textarea wire:model="excerpt" id="excerpt" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm"></textarea>
                                <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                            </div>

                            {{-- Trix Editor dengan Alpine.js untuk pre-fill data --}}
                            <div
                                wire:ignore
                                x-data="{ value: @entangle('content') }"
                                x-init="
                                    let trixEditor = document.getElementById('content');
                                    let trixElement = document.querySelector('trix-editor');
                                    trixElement.editor.loadHTML(value);
                                    trixElement.addEventListener('trix-change', event => {
                                        value = event.target.value;
                                    });
                                "
                            >
                                <x-input-label for="content" :value="__('Konten Lengkap Artikel')" />
                                <input id="content" type="hidden" name="content">
                                <trix-editor input="content" class="mt-1 trix-content"></trix-editor>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('posts-index') }}" wire:navigate class="w-full md:w-auto justify-center inline-flex items-center p-4  bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>
                        <x-primary-button class="w-full md:w-auto justify-center">
                            Simpan Perubahan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>