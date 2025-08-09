<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="pt-0 md:py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">

                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center pb-6 border-b dark:border-gray-700">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Nomor Transaksi</p>
                            <h3 class="text-2xl font-bold text-gray-800 dark:text-white">#{{ $transaction->id }}</h3>
                        </div>
                        <div>
                            @if (strtolower($transaction->status) == 'paid' || strtolower($transaction->status) == 'lunas')
                                <span class="inline-flex items-center px-4 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full dark:bg-green-900/50 dark:text-green-300 mt-4 sm:mt-0">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Lunas
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full dark:bg-yellow-900/50 dark:text-yellow-300 mt-4 sm:mt-0">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                    Menunggu Pembayaran
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Detail Klien</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Nama:</span>
                                    <span class="font-medium">{{ $transaction->user->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Email:</span>
                                    <span class="font-medium">{{ $transaction->user->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Detail Dokter</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Nama:</span>
                                    <span class="font-medium">{{ $transaction->doctor->name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-500 dark:text-gray-400">Spesialisasi:</span>
                                    <span class="font-medium">{{ $transaction->doctor->spesialis }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-8 dark:border-gray-700">

                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Jadwal Sesi Konsultasi</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-gray-50 dark:bg-gray-700/50 p-6 rounded-lg">
                            <div class="flex items-center gap-3">
                                <svg class="w-8 h-8 text-indigo-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4Z"></path></svg>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal</p>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ \Carbon\Carbon::parse($transaction->appointment_at)->translatedFormat('l, d F Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <svg class="w-8 h-8 text-indigo-500 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H16V14H11V7H13V12Z"></path></svg>
                                <div>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Waktu</p>
                                    <p class="font-semibold text-gray-800 dark:text-white">{{ \Carbon\Carbon::parse($transaction->appointment_time)->translatedFormat('H:i') }} WIB</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 text-center">
                            @if (strtolower($transaction->status) == 'paid' || strtolower($transaction->status) == 'lunas')
                                @if ($transaction->zoom_link != 'belum tersedia' && $transaction->zoom_link)
                                    <a href="{{ $transaction->zoom_link }}" target="_blank" class="inline-flex items-center justify-center w-full sm:w-auto px-6 py-3 text-base bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 transition">
                                        Gabung Sesi Meeting
                                    </a>
                                @else
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Link meeting akan segera tersedia. Mohon cek kembali nanti.</p>
                                @endif
                            @else
                                <p class="text-sm text-gray-500 dark:text-gray-400">Link meeting akan muncul di sini setelah pembayaran berhasil.</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>