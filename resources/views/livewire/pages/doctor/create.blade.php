<?php

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use function Livewire\Volt\{state, rules, on, mount, computed};
use Livewire\WithFileUploads;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;
     
    // Properti untuk setiap field di form
    public string $name = '';
    public string $spesialis = 'Klinis';
    public string $pendidikan = '';
    public string $deskripsi = '';
    public string $pengalaman = '';
    public string $SIPP = '';
    public string $harga = '';
    public $photo;

    /**
     * Menyimpan data dokter baru ke database.
     */
    public function saveDoctor()
    {
        // Aturan validasi
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'spesialis' => 'required|string',
            'deskripsi' => 'required|string',
            'pendidikan' => 'required|string',
            'pengalaman' => 'required|string|max:255',
            'SIPP' => 'required|string|max:255|unique:doctors,SIPP',
            'harga' => 'required|numeric|min:0',
            'photo' => 'required|image|max:2048',
        ]);

        $validated['photo'] = $this->photo->store('photos', 'public');

        Doctor::create($validated);

        session()->flash('status', 'Data dokter baru berhasil ditambahkan.');
        return $this->redirect(route('doctors-index'), navigate: true);
    }
}; ?>

{{-- TAG <x-layouts.app> DIHAPUS DARI SINI --}}

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Tambah Dokter Baru') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">

                <header class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Formulir Pendaftaran Dokter</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Isi semua detail di bawah ini untuk
                        menambahkan dokter baru ke platform.</p>
                </header>

                <form wire:submit.prevent="saveDoctor" class="mt-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-1">
                            <h4 class="font-semibold text-gray-700 dark:text-gray-300">Foto Profil Dokter</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Gunakan foto close-up yang jelas.
                            </p>
                            <div>
                                <label for="photo" class="cursor-pointer">
                                    @if ($photo)
                                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview Foto"
                                            class="w-full h-auto object-cover rounded-lg shadow-md border-2 border-dashed border-gray-300 dark:border-gray-600">
                                    @else
                                        <div
                                            class="w-full h-64 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg flex flex-col items-center justify-center text-center text-gray-500 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                                            <svg class="w-12 h-12 mb-2" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.99826 2H16L20.9997 7V20.9928C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5501 3 20.9932V2.9918ZM12 11C13.6569 11 15 12.3431 15 14C15 15.6569 13.6569 17 12 17C10.3431 17 9 15.6569 9 14C9 12.3431 10.3431 11 12 11Z">
                                                </path>
                                            </svg>
                                            <span class="font-semibold">Klik untuk mengunggah</span>
                                            <span class="text-xs">PNG, JPG, atau WEBP (Maks. 2MB)</span>
                                        </div>
                                    @endif
                                </label>
                                <input id="photo" wire:model="photo" type="file" class="sr-only">
                                @error('photo')
                                    <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <x-input-label for="name" :value="__('Nama Lengkap')" />
                                <x-text-input wire:model="name" id="name" name="name" type="text"
                                    class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="spesialis" :value="__('Spesialisasi')" />
                                <select wire:model="spesialis" id="spesialis" name="spesialis"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="Klinis">Psikolog Klinis</option>
                                    <option value="Pendidikan">Psikolog Pendidikan</option>
                                    <option value="Keluarga">Psikolog Keluarga & Pernikahan</option>
                                    <option value="Anak">Psikolog Anak & Remaja</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <x-input-error :messages="$errors->get('spesialis')" class="mt-2" />
                            </div>

                             <div>
                                <x-input-label for="pendidikan" :value="__('Pendidikan')" />
                                <x-text-input wire:model="pendidikan" id="pendidikan" name="pendidikan" type="text"
                                    class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('pendidikan')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="deskripsi" :value="__('Deskripsi Singkat')" />
                                <textarea wire:model="deskripsi" id="deskripsi" name="deskripsi" rows="4"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    placeholder="Contoh: Membantu klien mengatasi kecemasan dan depresi..."></textarea>
                                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="pengalaman" :value="__('Pengalaman (Tahun)')" />
                                    <x-text-input wire:model="pengalaman" id="pengalaman" name="pengalaman"
                                        type="number" class="mt-1 block w-full" placeholder="Contoh: 5" />
                                    <x-input-error :messages="$errors->get('pengalaman')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="SIPP" :value="__('Nomor SIPP')" />
                                    <x-text-input wire:model="SIPP" id="SIPP" name="SIPP" type="text"
                                        class="mt-1 block w-full" />
                                    <x-input-error :messages="$errors->get('SIPP')" class="mt-2" />
                                </div>
                            </div>

                            <div>
                                <x-input-label for="harga" :value="__('Tarif per Sesi (Rp)')" />
                                <x-text-input wire:model="harga" id="harga" name="harga" type="number"
                                    class="mt-1 block w-full" placeholder="Contoh: 150000" />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div
                        class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('doctors-index') }}" wire:navigate
                            class="w-full md:w-auto justify-center inline-flex items-center px-4 py-4 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>

                        <x-primary-button class="w-full md:w-auto justify-center">
                            {{ __('Simpan Data Dokter') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- TAG </x-layouts.app> DIHAPUS DARI SINI --}}
