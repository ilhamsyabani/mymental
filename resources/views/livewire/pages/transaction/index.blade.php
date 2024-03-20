<x-app-layout>
    <livewire:layout.navigation />

    <div class="container mx-auto">
        <div class="py-12">
            <div class="lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4">
                <div class="mb-4">
                    <div class="flex justify-between">
                        <h4 class="font-bold text-xl">
                            Daftar transaksi Anda
                        </h4>
                    </div>
                    <p>Transaksi Anda bulan ini</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    @foreach ($transactions as $transaction)
                        <a href="{{ route('transaction-show', $transaction->id) }}">
                            <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow-sm">
                                <div class="p-4">
                                    <div class="flex items-center mb-2">
                                        <img class="w-8 h-8 rounded-full" src="{{ asset($transaction->doctor->photo) }}"
                                            alt="Neil image">
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $transaction->doctor->name }}</p>
                                            <p class="text-sm text-gray-500 truncate">
                                                {{ $transaction->doctor->spesialis }}</p>
                                        </div>
                                        <div class="ml-auto text-base font-semibold text-gray-900">
                                            {{ $transaction->doctor->price }}</div>
                                    </div>

                                    <div class="flex justify-between mt-4 border rounded-xl px-8 py-4">
                                        <div class="flex items-center">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                            </svg>
                                            <p class="ml-2">{{ $transaction->date_book }}</p>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <p class="ml-2">{{ $transaction->time_book }}</p>
                                        </div>
                                    </div>

                                    <hr class="mt-4 mb-6">

                                    <div class="text-center">
                                        @if ($transaction->zoom_link == 'belum tersedia')
                                            Link Belum Tersedia
                                        @else
                                            <a href="{{ $transaction->zoom_link }}"
                                                class="text-blue-600">{{ $transaction->zoom_link }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
