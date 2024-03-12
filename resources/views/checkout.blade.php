<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Tagihan') }}
        </h2>
    </x-slot>

    <div class="">
        <!-- component -->
        <div class="flex flex-col m-auto p-auto w-full h-16 p-8">
            <div class="text-black font-medium leading-tight ">
                <h4>Status Pesanan : <span>{{ $order->status }}</span></h4>
            </div>
        </div>
        <div class="flex-col m-auto p-auto mt-4">
            <div class="w-[360px] h-[0px] border-t border-neutral-200 m-auto"></div>
        </div>

        <div class="flex flex-col px-8 py-4">
            <h4 class="w-full text-black font-medium leading-tight pb-4">Detail Pesanan</h4>
            <div
                class=" p-2 bg-white rounded-lg border-2 flex-col justify-start items-start gap-2.5 inline-flex">
                <div class=" justify-end items-end gap-2 inline-flex">
                    <div class="grow shrink basis-0 justify-start items-start gap-8 flex">
                        <div class="relative">
                            <img src="{{ asset($order->doctor->photo) }}" alt="image"
                                class="w-[80px] object-cover" />
                        </div>
                        <div class="flex-col justify-center items-start gap-2 inline-flex">
                            <div class="text-black text-sm font-medium first-line:leading-none">{{ $order->doctor->name}}
                            </div>
                            <div class="flex-col justify-start items-start gap-2 flex">
                                <div class="justify-start items-center gap-2 inline-flex">
                                    <div class="h-4 justify-center items-center gap-2 flex">
                                        <div class="justify-center items-center gap-2 flex">
                                            <div class="text-neutral-500 text-xs font-normal leading-[14px]">
                                                {{ $order->doctor->spesialis}} | 
                                            </div>
                                        </div>
                                        <div
                                            class="w-[24px] h-[20px] bg-gray-200 rounded justify-center items-center flex">
                                            <div class="justify-center items-center flex">
                                                <div class="text-center text-black text-xs font-normal ">
                                                    {{ $order->doctor->pendidikan }}</div>
                                            </div>
                                        </div>
                                        <div
                                            class="w-[36px] h-[20px] bg-gray-200 rounded justify-center items-center flex">
                                            <div class="justify-center items-center gap-0.5 flex">
                                                <div class="w-3 h-3 relative">
                                                    <svg width="12" height="12" viewBox="0 0 12 12"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_76_476)">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M4.5 8.5L6 7.03C5.805 7.01 5.66 7 5.5 7C4.165 7 1.5 7.67 1.5 9V10H6L4.5 8.5ZM5.5 6C6.605 6 7.5 5.105 7.5 4C7.5 2.895 6.605 2 5.5 2C4.395 2 3.5 2.895 3.5 4C3.5 5.105 4.395 6 5.5 6Z"
                                                                fill="#0A0A0A" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.735 10.25L6 8.5L6.7 7.795L7.735 8.835L10.3 6.25L11 6.955L7.735 10.25Z"
                                                                fill="#0A0A0A" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_76_476">
                                                                <rect width="12" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="text-center text-black text-xs font-normal">
                                                    42</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[196px] justify-start items-center gap-1 inline-flex">
                                    <div class="p-1 bg-gray-200 rounded justify-center items-center gap-2 flex">
                                        <div class="text-center text-black text-xs font-normal">Anxiety
                                        </div>
                                    </div>
                                    <div class="p-1 bg-gray-200 rounded justify-center items-center gap-2 flex">
                                        <div class="text-center text-black text-xs font-normal">Stress
                                        </div>
                                    </div>
                                    <div class="p-1 bg-gray-200 rounded justify-center items-center gap-2 flex">
                                        <div class="text-center text-black text-xs font-normal">Depresi
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[147px] justify-start items-start gap-2 inline-flex">
                                    <div class="justify-center items-center gap-1 flex">
                                        <div class="w-3 h-3 relative">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_89_716)">
                                                    <path
                                                        d="M10 1.5H9.5V0.5H8.5V1.5H3.5V0.5H2.5V1.5H2C1.45 1.5 1 1.95 1 2.5V10.5C1 11.05 1.45 11.5 2 11.5H10C10.55 11.5 11 11.05 11 10.5V2.5C11 1.95 10.55 1.5 10 1.5ZM10 10.5H2V4H10V10.5Z"
                                                        fill="#757575" />
                                                    <circle cx="3.5" cy="6" r="0.5" fill="#757575" />
                                                    <circle cx="3.5" cy="9" r="0.5" fill="#757575" />
                                                    <circle cx="6" cy="6" r="0.5" fill="#757575" />
                                                    <circle cx="6" cy="9" r="0.5" fill="#757575" />
                                                    <circle cx="8.5" cy="6" r="0.5" fill="#757575" />
                                                    <circle cx="8.5" cy="9" r="0.5" fill="#757575" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_89_716">
                                                        <rect width="12" height="12" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </div>
                                        <div class="text-neutral-500 text-[10px] font-normal leading-3">
                                            {{ $order->date_book }}</div>
                                    </div>
                                    <div class="justify-center items-center gap-1 flex">
                                        <div class="w-3 h-3 relative">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_89_729)">
                                                    <path
                                                        d="M5.995 1C3.235 1 1 3.24 1 6C1 8.76 3.235 11 5.995 11C8.76 11 11 8.76 11 6C11 3.24 8.76 1 5.995 1ZM6 10C3.79 10 2 8.21 2 6C2 3.79 3.79 2 6 2C8.21 2 10 3.79 10 6C10 8.21 8.21 10 6 10Z"
                                                        fill="#757575" />
                                                    <path d="M6.25 3.5H5.5V6.5L8.125 8.075L8.5 7.46L6.25 6.125V3.5Z"
                                                        fill="#757575" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_89_729">
                                                        <rect width="12" height="12" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </div>
                                        <div class="text-neutral-500 text-[10px] font-normal leading-3">
                                            {{ $order->time_book }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex-col m-auto p-auto">
            <div class="w-[360px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
        </div>
        <div class="flex flex-col px-8 py-4">
            <div class="w-full text-black font-medium leading-tight">Detail Pembelian</div>
            <div class="flex-col justify-start items-start inline-flex">
                <table class="mt-2">
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Nama Pelangan :</p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">{{ $order->name }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Email Pelangan :</p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">{{ $order->email }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Kategori Masalah :</p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">Stress</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Biaya Sesi :</p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">Rp.
                                {{ $order->price }}</p>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td>
                            <p class="text-zinc-600 py-1 text-xs font-normal leading-none">Biaya layanan :</p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-1 px-4  text-xs font-normal leading-none">Rp 5.000</p>
                        </td>
                    </tr> --}}
                </table>
            </div>
        </div>
        <div class="flex-col m-auto p-auto">
            <div class="w-[360px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
        </div>
        <div class="items-center mt-8 mx-8">
            <x-primary-button id="pay-button">
                {{ __('Lanjut ke Pembayaran') }}
            </x-primary-button>
        </div>

        <style>
            .hide-scroll-bar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .hide-scroll-bar::-webkit-scrollbar {
                display: none;
            }
        </style>
    </div>
    <script type="text/javascript">
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
    </script>
</x-app-layout>
