<x-app-layout>
    <livewire:layout.navigation />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8 px-4 sm:px-0">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Daftar Transaksi Anda</h3>
                <p class="mt-1 text-md text-gray-500 dark:text-gray-400">Berikut adalah semua sesi konsultasi yang pernah
                    Anda pesan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($transactions as $transaction)
                    <a href="{{ route('transaction-show', $transaction->id) }}" class="block group">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 h-full flex flex-col hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                            <div class="p-5 flex items-center gap-4">
                                <img class="w-12 h-12 rounded-full object-cover flex-shrink-0"
                                    src="{{ asset('storage/' . $transaction->doctor->photo) }}"
                                    alt="Foto {{ $transaction->doctor->name }}">
                                <div class="flex-grow">
                                    <p class="font-bold text-gray-900 dark:text-white truncate">
                                        {{ $transaction->doctor->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $transaction->doctor->spesialis }}</p>
                                </div>
                                <p class="text-lg font-semibold text-indigo-500 dark:text-indigo-400 flex-shrink-0">
                                    Rp {{ number_format($transaction->price, 0, ',', '.') }}
                                </p>
                            </div>

                            <hr class="dark:border-gray-700">

                            <div class="p-5 flex-grow space-y-3 text-sm">
                                <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c0-.414.336-.75.75-.75h10.5a.75.75 0 010 1.5H5.5a.75.75 0 01-.75-.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($transaction->appointment_at)->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Pukul
                                        {{ \Carbon\Carbon::parse($transaction->appointment_time)->translatedFormat('H:i') }}
                                        WIB</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                        <path fill-rule="evenodd"
                                            d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>
                                        @if (strtolower($transaction->status) == 'paid' || strtolower($transaction->status) == 'lunas')
                                            <span
                                                class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full dark:bg-green-900 dark:text-green-300">Lunas</span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:bg-yellow-900 dark:text-yellow-300">Menunggu
                                                Pembayaran</span>
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 bg-gray-50 dark:bg-gray-800/50 rounded-b-lg">
                                @if (strtolower($transaction->status) == 'paid' || strtolower($transaction->status) == 'lunas')
                                    @if ($transaction->zoom_link != 'belum tersedia' && $transaction->zoom_link)
                                        <div
                                            class="text-center text-sm font-semibold text-green-600 dark:text-green-400">
                                            Gabung Meeting</div>
                                    @else
                                        <div class="text-center text-sm text-gray-500">Link meeting akan segera tersedia
                                        </div>
                                    @endif
                                @else
                                    <div class="text-center text-sm font-semibold text-indigo-600 dark:text-indigo-400">
                                        Lihat Detail & Bayar</div>
                                @endif
                            </div>

                        </div>
                    </a>
                @empty
                    <div
                        class="md:col-span-2 lg:col-span-3 text-center py-16 px-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                        <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                        <h4 class="mt-4 font-semibold text-lg text-gray-700 dark:text-gray-200">Anda Belum Memiliki
                            Transaksi</h4>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Silakan jadwalkan sesi konsultasi
                            pertama Anda.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
