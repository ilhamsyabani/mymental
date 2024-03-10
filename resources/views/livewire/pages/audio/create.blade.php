<?php

use App\Models\Post;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public $title = '';
    public $cover ='';
    public $content = '';
    public $autor ='';
    /**
     * Handle an incoming registration request.
     */
    public function storepost(): void
    {
        $dd($this);

    }
};?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="max-w-full flex justify-between items-center mt-4 mb-8">
                        <h4 class=" text-lg font-semibold">Daftar Artikel </h4>
                     
                    </div>
                    <div>
                        <form action="{{ route('audio-store') }}" method="POST" enctype="multipart/form-data" class="mt-12">
                            @csrf
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700">Judul</label>
                                <input wire:model="title" id="title" type="text" name="title"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
        
                            <div class="mb-4">
                                <label for="cover" class="block mb-2 text-sm font-medium text-gray-900"> Link Gambar Sampul</label>
                                <input wire:model="title" id="title" type="text" name="cover"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('cover') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="autor" class="block mb-2 text-sm font-medium text-gray-900">Pembuat</label>
                                <input wire:model="title" id="title" type="text" name="autor"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('autor') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-4">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Link Content </label>
                                <input wire:model="title" id="title" type="text" name="content"
                                       class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
        
                            <button type="submit" class="block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Kirim</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
