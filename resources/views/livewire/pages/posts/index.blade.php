<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts.app')] class extends Component {
    public $posts;

    public function mount(): void
    {
        $this->posts = Post::with('user')->latest()->get();
    }

    // Method untuk menghapus post
    public function deletePost(int $id): void
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        // Kirim pesan sukses dan refresh daftar post
        session()->flash('status', 'Artikel berhasil dihapus.');
        $this->posts = Post::with('user')->latest()->get();
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Manajemen Artikel') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Komponen Notifikasi Flash Message --}}
        @if (session('status'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition:leave.duration.500ms
                class="mb-8 bg-green-50 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/20 dark:text-green-500 dark:border-green-500/30"
                role="alert">
                <span class="font-bold">Sukses!</span> {{ session('status') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                {{-- Header Konten: Judul dan Tombol Tambah --}}
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">Daftar Artikel</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola semua artikel yang ada di
                            platform.</p>
                    </div>
                    <x-primary-button href="{{ route('posts-create') }}" wire:navigate
                        class="w-full md:w-auto justify-center mt-4">
                        Tulis Artikel Baru
                    </x-primary-button>

                </div>

                {{-- Daftar Artikel --}}
                <div class="space-y-4">
                    @forelse ($posts as $post)
                        <div
                            class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row items-start sm:items-center gap-4">

                            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}"
                                class="w-full sm:w-32 h-32 sm:h-20 object-cover rounded-md flex-shrink-0">

                            <div class="flex-grow">
                                <a href="{{ route('posts-edit', $post) }}" wire:navigate
                                    class="font-bold text-lg text-gray-900 dark:text-white hover:text-indigo-500 dark:hover:text-indigo-400 transition">{{ $post->title }}</a>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Oleh {{ $post->user->name }} &bull; Dibuat pada
                                    {{ $post->created_at->translatedFormat('d F Y') }}
                                </p>
                            </div>

                            <div class="flex items-center gap-2 self-start sm:self-center mt-4 sm:mt-0 flex-shrink-0">
                                <a href="{{ route('posts-edit', $post) }}" wire:navigate
                                    class="p-2 text-gray-500 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 rounded-md transition">
                                    <span class="sr-only">Edit</span>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M16.7574 2.99666L14.7574 4.99666L18.9991 9.23842L21.0001 7.23842C21.3906 6.84789 21.3906 6.21473 21.0001 5.82421L18.1729 2.99698C17.7824 2.60645 17.1492 2.60645 16.7587 2.99698L16.7574 2.99666ZM2.99902 16.7585L13.2418 6.51576L17.4835 10.7575L7.24075 21.0002H2.99902V16.7585Z">
                                        </path>
                                    </svg>
                                </a>
                                <button wire:click="deletePost({{ $post->id }})"
                                    wire:confirm="Anda yakin ingin menghapus artikel ini?"
                                    class="p-2 text-red-500 bg-red-100 hover:bg-red-200 dark:bg-red-900/50 dark:text-red-400 dark:hover:bg-red-900 rounded-md transition">
                                    <span class="sr-only">Hapus</span>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM9 4V6H15V4H9Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 px-6 bg-gray-50 dark:bg-gray-700/50 rounded-lg">

                            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>

                            <h4 class="mt-4 font-semibold text-lg text-gray-700 dark:text-gray-200">Belum Ada Artikel
                            </h4>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silakan buat artikel baru untuk
                                memulai.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
