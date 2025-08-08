<?php

use App\Models\Audio;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts.app')] class extends Component {
    public $audios;

    public function mount(): void
    {
        // Fetch all audio, ordered by newest, with the author's name
        $this->audios = Audio::with('author')->latest()->get();
    }

    public function deleteAudio(int $id): void
    {
        $audio = Audio::findOrFail($id);

        // Delete the cover image and audio file from storage
        if ($audio->cover) {
            Storage::disk('public')->delete($audio->cover);
        }
        if ($audio->content) {
            Storage::disk('public')->delete($audio->content);
        }

        $audio->delete();

        session()->flash('status', 'Audio content has been successfully deleted.');
        $this->audios = Audio::with('author')->latest()->get();
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Audio Management') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('status'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition:leave.duration.500ms class="mb-8 bg-green-50 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/20 dark:text-green-500 dark:border-green-500/30" role="alert">
                <span class="font-bold">Success!</span> {{ session('status') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">List kontenAudio </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola konten audio yang ada dalam platform</p>
                    </div>
                     <x-primary-button href="{{ route('audios-create') }}" wire:navigate
                            class="w-full md:w-auto justify-center mt-4">
                            Tambah Audio
                        </x-primary-button>
                    
                </div>

                <div class="space-y-4">
                    @forelse ($audios as $audio)
                        <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                            
                            <img src="{{ asset('storage/' . $audio->cover) }}" alt="Cover for {{ $audio->title }}" class="w-24 h-24 object-cover rounded-md flex-shrink-0">
                            
                            <div class="flex-grow">
                                <a href="{{ route('audios-edit', $audio) }}" wire:navigate class="font-bold text-lg text-gray-900 dark:text-white hover:text-indigo-500 dark:hover:text-indigo-400 transition">{{ $audio->title }}</a>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    By {{ $audio->author->name }} &bull; Duration: {{ gmdate('i:s', $audio->duration_in_seconds) }}
                                </p>
                                <div class="mt-2">
                                    <audio controls class="w-full max-w-sm" src="{{ asset('storage/' . $audio->content) }}"></audio>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-2 self-start sm:self-center mt-4 sm:mt-0 flex-shrink-0">
                                <a href="{{ route('audios-edit', $audio) }}" wire:navigate class="p-2 text-gray-500 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 rounded-md transition">
                                    <span class="sr-only">Edit</span>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M16.7574 2.99666L14.7574 4.99666L18.9991 9.23842L21.0001 7.23842C21.3906 6.84789 21.3906 6.21473 21.0001 5.82421L18.1729 2.99698C17.7824 2.60645 17.1492 2.60645 16.7587 2.99698L16.7574 2.99666ZM2.99902 16.7585L13.2418 6.51576L17.4835 10.7575L7.24075 21.0002H2.99902V16.7585Z"></path></svg>
                                </a>
                                <button wire:click="deleteAudio({{ $audio->id }})" wire:confirm="Are you sure you want to delete this audio?" class="p-2 text-red-500 bg-red-100 hover:bg-red-200 dark:bg-red-900/50 dark:text-red-400 dark:hover:bg-red-900 rounded-md transition">
                                    <span class="sr-only">Delete</span>
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M7 6V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7ZM9 4V6H15V4H9Z"></path></svg>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 px-6 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <h4 class="font-semibold text-lg text-gray-700 dark:text-gray-200">Belum Ada Audio Tersedia</h4>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silahkan tambahkan data audio untuk memulai.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>