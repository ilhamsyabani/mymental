<?php

use App\Models\Audio;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public Audio $audio;
    public string $title;
    public ?int $duration_in_seconds;
    public $newCover;
    public $newContent;
    public $existingCover;
    public $existingContent;

    public function mount(Audio $audio): void
    {
        $this->audio = $audio;
        $this->title = $audio->title;
        $this->duration_in_seconds = $audio->duration_in_seconds;
        $this->existingCover = $audio->cover;
        $this->existingContent = $audio->content;
    }

    public function updateAudio()
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('audio')->ignore($this->audio->id)],
            'duration_in_seconds' => 'required|integer|min:1',
            'newCover' => 'nullable|image|max:2048',
            'newContent' => 'nullable|mimes:mp3,wav,m4a|max:10240',
        ]);

        if ($this->newCover) {
            if ($this->existingCover) Storage::disk('public')->delete($this->existingCover);
            $validated['cover'] = $this->newCover->store('audio_covers', 'public');
        }
        if ($this->newContent) {
            if ($this->existingContent) Storage::disk('public')->delete($this->existingContent);
            $validated['content'] = $this->newContent->store('audio_content', 'public');
        }

        unset($validated['newCover'], $validated['newContent']);

        $this->audio->update($validated);

        session()->flash('status', 'Audio has been successfully updated.');
        return $this->redirect(route('audios-index'));
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Audio') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                <header class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Edit Audio Form</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Update the details for the audio content below.</p>
                </header>

                <form wire:submit.prevent="updateAudio" class="mt-6 space-y-6">
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
                            <x-input-label for="newCover" :value="__('New Cover Image (Optional)')" />
                            <input wire:model="newCover" type="file" id="newCover" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-1">
                            @if ($newCover)
                                <img src="{{ $newCover->temporaryUrl() }}" class="mt-4 w-32 h-32 object-cover rounded-lg">
                            @elseif($existingCover)
                                <img src="{{ asset('storage/' . $existingCover) }}" class="mt-4 w-32 h-32 object-cover rounded-lg">
                            @endif
                            <x-input-error :messages="$errors->get('newCover')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="newContent" :value="__('New Audio File (Optional)')" />
                            <input wire:model="newContent" type="file" id="newContent" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 mt-1">
                            @if ($newContent)
                                <audio controls class="mt-4 w-full" src="{{ $newContent->temporaryUrl() }}"></audio>
                            @elseif($existingContent)
                                 <audio controls class="mt-4 w-full" src="{{ asset('storage/' . $existingContent) }}"></audio>
                            @endif
                            <x-input-error :messages="$errors->get('newContent')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                         <a href="{{ route('audios-index') }}" wire:navigate class="w-full md:w-auto justify-center inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Cancel
                        </a>
                        <x-primary-button class="w-full md:w-auto justify-center">
                            Save Changes
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>