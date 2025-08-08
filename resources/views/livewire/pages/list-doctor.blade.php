<?php

use App\Models\Doctor;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

new #[Layout('layouts.app')] class extends Component {
    use WithPagination;

    #[Url(as: 'q', except: '')]
    public string $search = '';

    // DITAMBAH: Properti untuk sorting
    #[Url(except: 'latest')]
    public string $sort = 'latest'; 

    public function with(): array
    {
        $doctors = Doctor::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                      ->orWhere('spesialis', 'like', "%{$this->search}%");
            })
            // Logika sorting baru
            ->when($this->sort === 'top_rated', fn($query) => $query->orderByDesc('rating'))
            ->when($this->sort === 'most_experienced', fn($query) => $query->orderByDesc('pengalaman'))
            ->when($this->sort === 'latest', fn($query) => $query->latest())
            ->paginate(12);

        return [
            'doctors' => $doctors,
        ];
    }
}; ?>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Temukan Psikolog') }}
    </h2>
</x-slot>

<div class="py-8 md:py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="mb-8 sm:px-0">
            <div class="text-center">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Para Profesional Siap Membantu Anda</h3>
                <p class="mt-2 text-lg text-gray-500 dark:text-gray-400">Cari dan filter psikolog untuk menemukan yang paling cocok untuk Anda.</p>
            </div>
            
            <div class="mt-6 flex flex-col md:flex-row gap-4 items-center max-w-3xl mx-auto">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="search" class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Cari nama atau spesialisasi...">
                </div>
                <div class="w-full md:w-auto">
                    <select wire:model.live="sort" class="w-full p-3 text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value="latest">Terbaru</option>
                        <option value="top_rated">Rating Tertinggi</option>
                        <option value="most_experienced">Paling Berpengalaman</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($doctors as $doctor)
                <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 flex flex-col overflow-hidden">
                    @if($doctor->rating >= 4.5)
                        <div class="absolute top-0 left-0 mt-3 -ml-1 z-10">
                            <div class="bg-yellow-400 text-yellow-900 text-xs font-bold px-3 py-1 rounded-r-full shadow-md">Top Rated</div>
                        </div>
                    @endif
                    
                    <a href="{{ route('doctor.show', $doctor->id) }}" wire:navigate class="block">
                        <img class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110" src="{{ asset('storage/' . $doctor->photo) }}" alt="Foto {{ $doctor->name }}">
                    </a>
                    
                    <div class="p-5 flex flex-col flex-grow">
                        <p class="text-sm text-indigo-500 dark:text-indigo-400">{{ $doctor->spesialis }}</p>
                        <a href="{{ route('doctor.show', $doctor->id) }}" wire:navigate>
                            <h4 class="font-bold text-lg text-gray-900 dark:text-white truncate mt-1">{{ $doctor->name }}</h4>
                        </a>

                        <div class="my-3 flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <span class="font-bold text-gray-700 dark:text-gray-200">{{ number_format($doctor->rating, 1) }}</span>
                                <span>({{ $doctor->total_reviews }})</span>
                            </div>
                            <span class="font-semibold">{{ $doctor->pengalaman }}+ thn</span>
                        </div>
                        
                        <div class="mt-auto pt-4 border-t dark:border-gray-700">
                            <a href="{{ route('doctor.show', $doctor->id) }}" wire:navigate class="w-full inline-flex justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition">
                                Lihat Profil
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="sm:col-span-2 md:col-span-3 lg:col-span-4 text-center py-16 px-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <h4 class="font-semibold text-lg text-gray-700 dark:text-gray-200">Tidak Ada Dokter yang Ditemukan</h4>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Coba gunakan filter atau kata kunci lain.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $doctors->links() }}
        </div>
    </div>
</div>