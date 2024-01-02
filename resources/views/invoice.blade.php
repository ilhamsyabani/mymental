<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pembayaran') }}
        </h2>
    </x-slot>

    <div class="">
        <!-- component -->
        <div class="flex flex-col m-auto p-auto w-full h-40 p-8">
            <div class="text-black font-medium leading-tight ">
                <h4>Status Pesanan : <span>{{ $order->status }}</span></h4>
            </div>
            <p class="py-2">Untuk link konsultasi akan kami kirim via email yang digunakan saat pendaftaran</p>
            <p class="text-xs mt-4">*Jika Anda mengalami kendala silahkan kosultasikan melalui link : <span
                    class=" font-semibold text-blue-700"><a href="">Contact Suport</a></span></p>

        </div>
        <div class="flex-col m-auto p-auto mt-4">
            <div class="w-[360px] h-[0px] border-t border-neutral-200 m-auto"></div>
        </div>
        <div class="flex-col m-auto p-auto">
            <div class="w-[360px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
        </div>
        <div class="flex flex-col px-8 py-4">
            <div class="w-full text-black font-medium leading-tight">Detail Pembayaran</div>
            <div class="flex-col justify-start items-start inline-flex">
                <table class="mt-2">
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Nama Pelangan </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $order->name }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Email </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $order->email }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Nama Doktor </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">:
                                {{ $order->doctor->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Kategori Masalah </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: Stress</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Tanggal konsultasi </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">:
                                {{ $order->date_book }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Jam konsultasi </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">:
                                {{ $order->time_book }}</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Biaya Sesi </p>
                        </td>
                        <td>
                            <p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: Rp
                                {{ $order->price }}</p>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td><p class="text-zinc-600 py-2 text-sm font-normal leading-none">Biaya layanan </p></td>
                        <td><p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: Rp 5.000</p></td>
                    </tr> --}}
                </table>
            </div>
        </div>
        <div class="flex-col m-auto p-auto">
            <div class="w-[360px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
        </div>
        <div class="items-center mt-8 mx-8">
            <a href="/dashboard">
                <x-primary-button class="">
                    {{ __('Kebali ke Dashboard') }}
                </x-primary-button>
            </a>
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
</x-app-layout>
