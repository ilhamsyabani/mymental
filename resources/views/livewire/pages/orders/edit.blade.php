<?php

use App\Models\Order;
use Livewire\Volt\Component;
use Illuminate\Validation\Rule;

new #[Layout('layouts.app')] class extends Component {
    public Order $order; // Menerima model Order dari route

    // Properti untuk form
    public string $zoom_link = '';
    public string $status = '';

    /**
     * Method mount() dijalankan saat komponen dimuat.
     * Mengisi form dengan data dari pesanan yang ada.
     */
    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->zoom_link = $order->zoom_link ?? '';
        $this->status = $order->status;
    }

    /**
     * Menyimpan perubahan data pesanan ke database.
     */
    public function updateOrder()
    {
        $validated = $this->validate([
            // Link zoom boleh kosong, tapi jika diisi harus berupa URL yang valid
            'zoom_link' => 'nullable|url',
            // Status wajib diisi dan harus salah satu dari nilai yang ditentukan
            'status' => ['required', Rule::in(['paid', 'unpaid', 'lunas'])],
        ]);

        // Update record di database
        $this->order->update($validated);

        session()->flash('status', 'Data pesanan berhasil diperbarui.');
        return $this->redirect(route('orders-index'));
    }
}; ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pesanan') }} #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form wire:submit.prevent="updateOrder">
                    <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">
                        <header class="pb-6 border-b dark:border-gray-700">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Detail Pesanan</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Lihat detail dan perbarui status
                                atau link meeting di bawah ini.</p>
                        </header>

                        <!-- Ringkasan Informasi (Read-only) -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Klien</p>
                                <p class="font-semibold text-gray-800 dark:text-white">{{ $order->user->name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Dokter</p>
                                <p class="font-semibold text-gray-800 dark:text-white">{{ $order->doctor->name }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Jadwal</p>
                                <p class="font-semibold text-gray-800 dark:text-white">
                                    {{ \Carbon\Carbon::parse($order->appointment_at)->translatedFormat('l, d F Y') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-500 dark:text-gray-400">Waktu</p>
                                <p class="font-semibold text-gray-800 dark:text-white">
                                    {{ \Carbon\Carbon::parse($order->appointment_time)->translatedFormat('H:i') }} WIB
                                </p>
                            </div>
                        </div>

                        <hr class="my-8 dark:border-gray-700">

                        <!-- Form Edit untuk Admin -->
                        <div class="space-y-6">
                            <div>
                                <x-input-label for="zoom_link" :value="__('Link Meeting (Zoom/Google Meet)')" />
                                <x-text-input wire:model="zoom_link" id="zoom_link" type="url"
                                    class="mt-1 block w-full" placeholder="https://zoom.us/j/..." />
                                <x-input-error :messages="$errors->get('zoom_link')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label :value="__('Status Pembayaran')" />
                                <div class="mt-2 flex flex-col sm:flex-row gap-4">
                                    <label
                                        class="flex items-center p-4 border rounded-lg cursor-pointer w-full {{ $status === 'paid' || $status === 'lunas' ? 'bg-indigo-50 border-indigo-500 dark:bg-indigo-900/50 dark:border-indigo-600' : 'dark:border-gray-700' }}">
                                        <input type="radio" wire:model="status" name="status" value="paid"
                                            class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Lunas
                                            (Paid)</span>
                                    </label>
                                    <label
                                        class="flex items-center p-4 border rounded-lg cursor-pointer w-full {{ $status === 'unpaid' ? 'bg-indigo-50 border-indigo-500 dark:bg-indigo-900/50 dark:border-indigo-600' : 'dark:border-gray-700' }}">
                                        <input type="radio" wire:model="status" name="status" value="unpaid"
                                            class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Belum
                                            Dibayar (Unpaid)</span>
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col md:flex-row items-center justify-end gap-4 p-6  border-t border-gray-200 dark:border-gray-700">

                        <a href="{{ route('orders-index') }}" wire:navigate
                            class="w-full md:w-auto justify-center inline-flex items-center p-4  bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                            Batal
                        </a>
                        <x-primary-button class="w-full md:w-auto justify-center">
                            Simpan Perubahan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
