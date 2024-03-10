<?php

use App\Models\Post;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component {
    public $title = '';
    public $image;
    public $content = '';
    /**
     * Handle an incoming registration request.
     */
    public function storepost(): void
    {
        $dd($this);
    }
}; ?>

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
                        <form action="{{ route('doctor-store') }}" method="POST" enctype="multipart/form-data"
                            class="mt-12">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Nama</label>
                                <input wire:model="name" id="name" type="text" name="name"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">
                                    Photo</label>
                                <input wire:model="photo" id="photo" type="text" name="photo"
                                class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('photo')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="cover" class="block mb-2 text-sm font-medium text-gray-900">Cover</label>
                                <input wire:model="cover" id="cover" type="text" name="cover"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('cover')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="spesialis"
                                    class="block mb-2 text-sm font-medium text-gray-900">Spesialis</label>
                                <select wire:model="spesialis" id="spesialis" name="spesialis"
                                class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                    <option value="Anak">Anak</option>
                                    <option value="Klinis">Kelinis</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Lainya">Lainnya</option>
                                </select>
                                @error('spesialis')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                <textarea wire:model="deskripsi" id="deskripsi" name="deskripsi"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none"></textarea>
                                @error('deskripsi')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="pengalaman"
                                    class="block mb-2 text-sm font-medium text-gray-900">Pengalaman</label>
                                <input wire:model="pengalaman" id="pengalaman" type="text" name="pengalaman"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('pengalaman')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="SIPP" class="block mb-2 text-sm font-medium text-gray-900">SIPP</label>
                                <input wire:model="SIPP" id="SIPP" type="text" name="SIPP"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('SIPP')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                                <input wire:model="harga" id="harga" type="text" name="harga"
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('harga')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit"
                                class="block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
