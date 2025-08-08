{{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    window.location.href ='/invoice/{{ $order->id }}';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script> --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Tagihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 text-gray-900 dark:text-gray-100">

                    <div class="text-center mb-8">
                        <h3 class="text-lg font-medium text-gray-500 dark:text-gray-400">Total Pembayaran</h3>
                        <p class="text-5xl font-bold text-gray-900 dark:text-white mt-2">
                            Rp {{ number_format($order->price, 0, ',', '.') }}
                        </p>
                        <div class="mt-4">
                            @if (strtolower($order->status) == 'paid' || strtolower($order->status) == 'lunas')
                                <span
                                    class="inline-flex items-center px-4 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full dark:bg-green-900/50 dark:text-green-300">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Lunas
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-4 py-1 bg-yellow-100 text-yellow-800 text-sm font-medium rounded-full dark:bg-yellow-900/50 dark:text-yellow-300">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Menunggu Pembayaran
                                </span>
                            @endif
                        </div>
                    </div>

                    <hr class="dark:border-gray-700">

                    <div class="my-8">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Ringkasan Janji Temu</h4>
                        <div
                            class="flex items-start gap-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg border dark:border-gray-700">
                            <img src="{{ asset('storage/' . $order->doctor->photo) }}"
                                alt="Foto {{ $order->doctor->name }}"
                                class="w-20 h-20 object-cover rounded-full flex-shrink-0">
                            <div class="flex-grow">
                                <p class="font-bold text-gray-900 dark:text-white">{{ $order->doctor->name }}</p>
                                <p class="text-sm text-indigo-500 dark:text-indigo-400">{{ $order->doctor->spesialis }}
                                </p>

                                <div class="mt-3 text-sm text-gray-600 dark:text-gray-300 space-y-2">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c0-.414.336-.75.75-.75h10.5a.75.75 0 010 1.5H5.5a.75.75 0 01-.75-.75z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($order->appointment_at)->translatedFormat('l, d F Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-13a.75.75 0 00-1.5 0v5c0 .414.336.75.75.75h4a.75.75 0 000-1.5h-3.25V5z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Pukul
                                            {{ \Carbon\Carbon::parse($order->appointment_time)->translatedFormat('H:i') }}
                                            WIB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white">Rincian Pembayaran</h4>
                        <div class="text-sm text-gray-600 dark:text-gray-300 space-y-2">
                            <div class="flex justify-between">
                                <span>Konsultasi Sesi</span>
                                <span>Rp {{ number_format($order->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Biaya Layanan</span>
                                <span>Rp 5.000</span>
                            </div>
                        </div>
                        <hr class="pt-2 dark:border-gray-700">
                        <div class="flex justify-between font-bold text-gray-900 dark:text-white">
                            <span>Total</span>
                            <span>Rp {{ number_format($order->price + 5000, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    @if (strtolower($order->status) != 'paid' && strtolower($order->status) != 'lunas')
                        <div class="mt-10">
                            <x-primary-button href="{{ route('order-whatsapp', ['order' => $order]) }}" target="_blank"
                                id="pay-button" class="w-full justify-center py-3 text-base">
                                {{ __('Lanjut ke Pembayaran') }}
                            </x-primary-button>
                        </div>
                    @else
                        <div class="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
                            Terima kasih telah melakukan pembayaran.
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
