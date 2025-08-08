<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new #[Layout('layouts.app')] class extends Component {
    use WithPagination;

    #[Url(as: 'q', except: '')]
    public string $search = '';

    /**
     * Mengambil daftar artikel dengan fitur pencarian dan paginasi.
     * Computed property akan otomatis re-run saat $this->search berubah.
     */
    public function with(): array
    {
        $posts = Post::with('user')
            ->where('published_at', '<=', now()) // Hanya tampilkan yang sudah terbit
            ->when($this->search, function ($query) {
                $query->where('title', 'like', "%{$this->search}%");
            })
            ->latest('published_at')
            ->paginate(9);

        return [
            'posts' => $posts,
        ];
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Artikel') }}
    </h2>
</x-slot>

<div class="py-8 md:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8 px-0 sm:px-4 text-center">
            <h3 class="text-xl md:text-3xl font-bold text-gray-900 dark:text-white">Wawasan & Pengetahuan</h3>
            <p class="mt-2 text-sm md:text-lx text-gray-500 dark:text-gray-400">Temukan artikel terbaru seputar kesehatan mental dan pengembangan diri.</p>
            
            <div class="mt-6 max-w-md mx-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input 
                        wire:model.live.debounce.300ms="search"
                        type="search" 
                        id="default-search" 
                        class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" 
                        placeholder="Cari artikel berdasarkan judul..."
                    >
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($posts as $post)
                <a href="{{ route('articles.show', ['article' => $post]) }}" wire:navigate class="block group bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}">
                    
                    <div class="p-5">
                        <div class="flex items-center gap-3 mb-3">
                            <img class="w-8 h-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=random" alt="Avatar {{ $post->user->name }}">
                            <div>
                                <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $post->user->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>

                        <h4 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-indigo-500 dark:group-hover:text-indigo-400 transition-colors">{{ $post->title }}</h4>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300 leading-relaxed line-clamp-3">{{ $post->excerpt }}</p>
                    </div>
                </a>
            @empty
                <div class="md:col-span-2 lg:col-span-3 text-center py-16 px-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <h4 class="mt-4 font-semibold text-lg text-gray-700 dark:text-gray-200">Tidak Ada Artikel yang Ditemukan</h4>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba gunakan kata kunci lain atau lihat kembali nanti.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</div>