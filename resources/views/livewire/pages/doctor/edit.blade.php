<?php

use App\Models\Doctor;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

new #[Layout('layouts.app')] class extends Component {
    use WithFileUploads;

    public Doctor $doctor;

    public string $name = '';
    public string $spesialis = '';
    public string $pendidikan = '';
    public string $deskripsi = '';
    public string $pengalaman = '';
    public string $SIPP = '';
    public string $harga = '';
    
    public $newPhoto; 
    public $existingPhoto; 


    public function mount(Doctor $doctor): void
    {
        $this->doctor = $doctor; 

        $this->name = $doctor->name;
        $this->spesialis = $doctor->spesialis;
        $this->pendidikan = $doctor->pendidikan;
        $this->deskripsi = $doctor->deskripsi;
        $this->pengalaman = $doctor->pengalaman;
        $this->SIPP = $doctor->SIPP;
        $this->harga = $doctor->harga;
        $this->existingPhoto = $doctor->photo;
    }

    public function updateDoctor()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'spesialis' => 'required|string',
            'pendidikan' => 'required|string',
            'deskripsi' => 'required|string',
            'pengalaman' => 'required|string|max:255',
            'SIPP' => ['required', 'string', 'max:255', Rule::unique('doctors')->ignore($this->doctor->id)],
            'harga' => 'required|numeric|min:0',
            'photo' => 'nullable|image|max:2048', 
        ]);

        if ($this->newPhoto) {
            if ($this->existingPhoto) {
                Storage::disk('public')->delete($this->existingPhoto);
            }
            $validated['photo'] = $this->newPhoto->store('photos', 'public');
        }

        unset($validated['newPhoto']);
        
        $this->doctor->update([
            'name' => $validated['name'],
            'spesialis' => $validated['spesialis'],
            'pendidikan' => $validated['pendidikan'],
            'deskripsi' => $validated['deskripsi'],
            'pengalaman' => $validated['pengalaman'],
            'SIPP' => $validated['SIPP'],
            'harga' => $validated['harga'],
            'photo' => $validated['photo'] ?? $this->existingPhoto,
        ]);

        session()->flash('status', 'Data dokter berhasil diperbarui.');
        return $this->redirect(route('doctors-index'), navigate: true);
    }
}; ?>


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Edit Data: <span class="text-indigo-500">{{ $name }}</span>
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 sm:p-8 text-gray-900 dark:text-gray-100">
                <header class="mb-8">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Formulir Edit Dokter</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Perbarui detail dokter di bawah ini.</p>
                </header>

                <form wire:submit.prevent="updateDoctor" class="mt-6 space-y-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-1">
                            <h4 class="font-semibold text-gray-700 dark:text-gray-300">Foto Profil Dokter</h4>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Klik gambar untuk mengganti foto.</p>
                            <div>
                                <label for="photo-upload" class="cursor-pointer group">
                                    <div class="relative">
                                        @if ($newPhoto)
                                            <img src="{{ $newPhoto->temporaryUrl() }}" alt="Preview Foto Baru" class="w-full h-auto object-cover rounded-lg shadow-md">
                                        @elseif ($existingPhoto)
                                            <img src="{{ asset('storage/' . $existingPhoto) }}" alt="Foto Saat Ini" class="w-full h-auto object-cover rounded-lg shadow-md">
                                        @else
                                            <div class="w-full h-64 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg flex flex-col items-center justify-center text-center text-gray-500">
                                                <svg class="w-12 h-12 mb-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.99826 2H16L20.9997 7V20.9928C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5501 3 20.9932V2.9918ZM12 11C13.6569 11 15 12.3431 15 14C15 15.6569 13.6569 17 12 17C10.3431 17 9 15.6569 9 14C9 12.3431 10.3431 11 12 11Z"></path></svg>
                                                <span>Upload Foto</span>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-black/50 rounded-lg flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                            <span class="font-semibold">Ganti Foto</span>
                                        </div>
                                    </div>
                                </label>
                                <input id="photo-upload" wire:model="newPhoto" type="file" class="sr-only">
                                @error('newPhoto') <span class="text-red-500 text-sm mt-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="lg:col-span-2 space-y-6">
                            <div>
                                <x-input-label for="name" :value="__('Nama Lengkap')" />
                                <x-text-input wire:model="name" id="name" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="spesialis" :value="__('Spesialisasi')" />
                                <select wire:model="spesialis" id="spesialis" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
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
                                <x-text-input wire:model="pendidikan" id="pendidikan" type="text" class="mt-1 block w-full" required />
                                <x-input-error :messages="$errors->get('pendidikan')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="deskripsi" :value="__('Deskripsi Singkat')" />
                                <textarea wire:model="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
                                <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="pengalaman" :value="__('Pengalaman (Tahun)')" />
                                    <x-text-input wire:model="pengalaman" id="pengalaman" type="number" class="mt-1 block w-full" />
                                    <x-input-error :messages="$errors->get('pengalaman')" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="SIPP" :value="__('Nomor SIPP')" />
                                    <x-text-input wire:model="SIPP" id="SIPP" type="text" class="mt-1 block w-full" />
                                    <x-input-error :messages="$errors->get('SIPP')" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <x-input-label for="harga" :value="__('Tarif per Sesi (Rp)')" />
                                <x-text-input wire:model="harga" id="harga" type="number" class="mt-1 block w-full" />
                                <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('doctors-index') }}" wire:navigate class="w-full md:w-auto justify-center inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>
                        <x-primary-button class="w-full md:w-auto justify-center">
                            {{ __('Simpan Perubahan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>