<x-app-layout>
    <livewire:layout.navigation />

    <div class="container mx-auto">
        <div class="py-12">
            <div class="lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4">
                <div class="mb-4">
                    <div class="flex justify-between">
                        <h4 class="font-bold text-xl">
                            Detail Transaksi
                        </h4>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="p-4">
                            <h4>Deatail User</h4>
                            <table class="mt-2">
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Nama Pelangan </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $transaction->name }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Email </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $transaction->email }}
                                        </p>
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
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Biaya Sesi </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: Rp
                                            {{ $transaction->price }}</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Status </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: 
                                            {{ $transaction->status }}</p>
                                    </td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>

                    <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="p-4">
                            <h4>Deatail Dokter</h4>
                            <table class="mt-2">
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Kode Tansaksi </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $transaction->kode }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Nama Dokter </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $transaction->doctor->name }}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Spesialis</p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $transaction->doctor->spesialis }}
                                        </p>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Pendidikan </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4 text-sm font-normal leading-none">: {{ $transaction->doctor->pendidikan }}
                                        </p>
                                    </td>
                                </tr></p>
                                    </td>
                                </tr>
            
                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">Pengalaman </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: 
                                            {{ $transaction->doctor->pengalaman }} tahun</p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p class="text-zinc-600 py-2 text-sm font-normal leading-none">SIPP </p>
                                    </td>
                                    <td>
                                        <p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: 
                                            {{ $transaction->doctor->SIPP }}</p>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td><p class="text-zinc-600 py-2 text-sm font-normal leading-none">Biaya layanan </p></td>
                                    <td><p class="text-zinc-600 py-2 px-4  text-sm font-normal leading-none">: Rp 5.000</p></td>
                                </tr> --}}
                            </table>
                        </div>
                    </div>

                    <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="p-4">
                            <h4>Deatail Zoom</h4>
                            <div class="flex justify-between mt-4 border rounded-xl px-8 py-4">
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                    </svg>
                                    <p class="ml-2">{{ $transaction->date_book }}</p>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
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

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
