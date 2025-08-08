<?php

use App\Models\Audio;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public string $title = '';
    public ?int $duration_in_seconds = null;
    public $cover;
    public $content;

    public function saveAudio()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255|unique:audio,title',
            'duration_in_seconds' => 'required|integer|min:1',
            'cover' => 'required|image|max:2048', // 2MB Max
            'content' => 'required|mimes:mp3,wav,m4a|max:10240', // 10MB Max for audio
        ]);

        $validated['cover'] = $this->cover->store('audio_covers', 'public');
        $validated['content'] = $this->content->store('audio_content', 'public');
        $validated['author_id'] = Auth::id();

        Audio::create($validated);

        session()->flash('status', 'New audio has been successfully added.');
        return $this->redirect(route('audios-index'));
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Add New Audio') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                <header class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Audio Form</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload and provide details for the new audio content.</p>
                </header>

                <form wire:submit.prevent="saveAudio" class="mt-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <x-input-label for="title" :value="__('Audio Title')" />
                            <x-text-input wire:model="title" id="title" type="text" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="duration_in_seconds" :value="__('Duration (in seconds)')" />
                            <x-text-input wire:model="duration_in_seconds" id="duration_in_seconds" type="number" class="mt-1 block w-full" required />
                            <x-input-error :messages="$errors->get('duration_in_seconds')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="cover" :value="__('Cover Image')" />
                            <input wire:model="cover" type="file" id="cover" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-1">
                            @if ($cover)
                                <img src="{{ $cover->temporaryUrl() }}" class="mt-4 w-32 h-32 object-cover rounded-lg">
                            @endif
                            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="content" :value="__('Audio File (MP3, WAV)')" />
                            <input wire:model="content" type="file" id="content" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-1">
                            @if ($content)
                                <audio controls class="mt-4 w-full" src="{{ $content->temporaryUrl() }}"></audio>
                            @endif
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('audios-index') }}" wire:navigate class="w-full md:w-auto justify-center inline-flex items-center p-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <x-primary-button class="w-full md:w-auto justify-center">
                         Simpan Audio
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>