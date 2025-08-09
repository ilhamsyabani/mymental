<?php

use App\Models\Post;
use Livewire\Volt\Component;

// Memberi tahu Volt untuk menggunakan layout utama
new class extends Component {
   
    public Post $article;

    // Method with() digunakan untuk mengirim data tambahan ke view
    public function with(): array
    {
        $relatedArticles = Post::with('user')
            ->where('published_at', '<=', now())
            ->where('id', '!=', $this->article->id)
            ->latest('published_at')
            ->take(3)
            ->get();
            
        return [
            'relatedArticles' => $relatedArticles
        ];
    }
}; ?>
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Artikel') }}
    </h2>
</x-slot>

<div class="pt-0 md:py-12 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
            <img class="w-full h-64 md:h-80 object-cover" src="{{ asset('storage/'.$article->image) }}" alt="Gambar sampul untuk {{ $article->title }}">
            
            <div class="p-6 md:p-8">
                <header class="mb-8">
                    <h1 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white leading-tight">
                        {{$article->title}}
                    </h1>
                    <div class="mt-4 flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-2">
                            <img class="w-8 h-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=random" alt="Avatar {{ $article->user->name }}">
                            <span>Oleh {{ $article->user->name }}</span>
                        </div>
                        <span>&bull;</span>
                        <span>Diterbitkan: {{\Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') }}</span>
                    </div>
                </header>
                
                <div class="prose dark:prose-invert max-w-none text-gray-700 dark:text-gray-300">
                    {!! $article->content !!}
                </div>

                <hr class="my-10 dark:border-gray-700">

                {{-- <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Baca Juga</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($relatedArticles as $related)
                            <a href="{{ route('article.show', $related->slug) }}" wire:navigate class="block group">
                                <img class="w-full h-32 object-cover rounded-lg mb-2" src="{{ asset('storage/' . $related->image) }}" alt="">
                                <p class="font-semibold text-gray-800 dark:text-gray-200 group-hover:text-indigo-500 dark:group-hover:text-indigo-400 transition-colors">{{ $related->title }}</p>
                            </a>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</x-app-layout>