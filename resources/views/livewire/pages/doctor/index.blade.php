<?php

use App\Models\Doctor;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;
use function Livewire\Volt\{state, rules, on, mount, computed};

new #[Layout('layouts.app')] class extends Component {
    public $doctors;

    public function mount()
    {
        $this->doctors = Doctor::all();
    }

    public function editDoctor($id)
    {
        return $this->redirect(route('doctors-edit', $id), navigate: true);
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            if (File::exists(public_path($doctor->photo))) {
                File::delete(public_path($doctor->photo));
            }

            $doctor->delete();

            session()->flash('status', 'Data dokter berhasil dihapus.');
            return $this->redirect(route('doctors-index'), navigate: true);
        }
    }
}; ?>

{{-- Notifikasi/Alert yang sudah dipercantik --}}
<div>
    @if (session('status'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)" x-transition:leave.duration.500ms
                id="alert-session"
                class="flex items-center p-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 border border-green-200 dark:border-green-700"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('status') }}
                </div>
                <button @click="show = false" type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    {{-- Slot Header tidak perlu diubah, sudah baik --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manajemen Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Header Konten: Judul dan Tombol Tambah --}}
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                        <div>
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Daftar Dokter Terdaftar</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola data para dokter yang
                                tersedia di platform.</p>
                        </div>
                        <x-primary-button href="{{ route('doctors-create') }}"
                            class="w-full md:w-auto justify-center mt-4">
                            Tambah Dokter
                        </x-primary-button>
                    </div>

                    {{-- DESAIN BARU: Daftar Dokter dengan Layout Kartu --}}
                    <div class="space-y-4">
                        @forelse ($doctors as $doctor)
                            <div
                                class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700 flex flex-col sm:flex-row items-start sm:items-center gap-4">

                                <img src="{{ asset('storage/' . $doctor->photo) }}" alt="Foto {{ $doctor->name }}"
                                    class="w-24 h-24 sm:w-28 sm:h-28 object-cover rounded-md flex-shrink-0 border-2 border-white dark:border-gray-600 shadow-sm">

                                <div class="flex-grow">
                                    <h4 class="font-bold text-lg text-gray-900 dark:text-white">{{ $doctor->name }}</h4>
                                    <p class="text-indigo-500 dark:text-indigo-400 font-semibold text-sm">
                                        {{ $doctor->spesialis }}</p>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">Tarif:
                                        <span class="font-bold">Rp
                                            {{ number_format($doctor->harga, 0, ',', '.') }}</span>
                                    </p>
                                </div>

                                <div
                                    class="flex items-center gap-2 self-start sm:self-center mt-4 sm:mt-0 flex-shrink-0">
                                    <button wire:click="editDoctor({{ $doctor->id }})"
                                        class="p-2 text-gray-500 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500 rounded-md transition">
                                        <span class="sr-only">Edit</span>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M16.7574 2.99666L14.7574 4.99666L18.9991 9.23842L21.0001 7.23842C21.3906 6.84789 21.3906 6.21473 21.0001 5.82421L18.1729 2.99698C17.7824 2.60645 17.1492 2.60645 16.7587 2.99698L16.7574 2.99666ZM2.99902 16.7585L13.2418 6.51576L17.4835 10.7575L7.24075 21.0002H2.99902V16.7585Z">
                                            </path>
                                        </svg>
                                    </button>
                                    {{-- PERBAIKAN: Menggunakan konfirmasi saat menghapus --}}
                                    <button wire:click="deleteDoctor({{ $doctor->id }})"
                                        wire:confirm="Anda yakin ingin menghapus data dokter ini?"
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
                            {{-- Pesan jika tidak ada data dokter --}}
                            <div class="text-center py-12 px-6 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <svg class="w-16 h-16 mx-auto text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z">
                                    </path>
                                </svg>
                                <h4 class="mt-4 font-semibold text-lg text-gray-700 dark:text-gray-200">Belum Ada Data
                                    Dokter</h4>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silakan tambahkan data dokter
                                    baru untuk memulai.</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
