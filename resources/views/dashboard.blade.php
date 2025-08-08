<x-app-layout>
    {{-- Navigasi tetap ada sesuai permintaan --}}
    <livewire:layout.navigation />

    {{-- Kontainer utama dengan padding untuk mobile dan pembatas lebar untuk desktop --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-8 sm:py-12">

            @if($order)
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Jadwal Konsultasi Anda</h2>
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden border border-gray-200 dark:border-gray-700">
                    <div class="p-5">
                        <div class="flex items-center space-x-4 mb-5">
                            <img class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm" src="{{ asset('storage/'.$order->doctor->photo) }}" alt="Foto {{ $order->doctor->name }}">
                            <div class="flex-1">
                                <p class="text-lg font-bold text-gray-900 dark:text-white truncate">{{ $order->doctor->name }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->doctor->spesialis }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 mb-6 text-sm">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg w-full">
                                <svg class="w-5 h-5 text-indigo-500 dark:text-indigo-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4Z"></path></svg>
                                <span class="font-medium text-gray-700 dark:text-gray-200">{{ \Carbon\Carbon::parse($order->appointment_at)->translatedFormat('l, d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg w-full">
                                <svg class="w-5 h-5 text-indigo-500 dark:text-indigo-400 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H16V14H11V7H13V12Z"></path></svg>
                                <span class="font-medium text-gray-700 dark:text-gray-200">{{ $order->appointment_time }} WIB</span>
                            </div>
                        </div>

                        @if($order->zoom_link == "belum tersedia")
                            <div class="text-center w-full bg-yellow-100 text-yellow-800 text-sm font-medium px-4 py-3 rounded-lg dark:bg-yellow-900/50 dark:text-yellow-300">
                                Link Konsultasi Belum Tersedia
                            </div>
                        @else
                            <a href="{{ $order->zoom_link }}" target="_blank" class="block w-full text-center bg-indigo-600 text-white font-bold px-6 py-3 rounded-lg hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                                Gabung Konsultasi
                            </a>
                        @endif
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-900/50 px-5 py-3 text-center">
                         <a href="{{ route('transactions-index') }}" class="text-sm font-medium text-indigo-600 hover:underline dark:text-indigo-400">
                            Lihat Riwayat Transaksi
                        </a>
                    </div>
                </div>
            </div>
            @endif


            <div class="space-y-12">

                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Artikel Untukmu</h3>
                        <a href="{{ route('articles') }}" class="text-sm font-medium text-indigo-600 hover:underline dark:text-indigo-400">Lihat Semua</a>
                    </div>
                    <div class="flex space-x-4 overflow-x-auto pb-4 hide-scroll-bar">
                        @foreach ($posts as $post)
                            <a href="{{ route('articles.show', $post->id) }}" class="flex-shrink-0 w-64 group">
                                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                    <img class="h-32 w-full object-cover" src="{{ asset('storage/'.$post->image) }}" alt="">
                                    <div class="p-4">
                                        <h4 class="font-semibold text-gray-900 dark:text-white leading-tight truncate-2-lines group-hover:text-indigo-500 dark:group-hover:text-indigo-400">{{ $post->title }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Audio Relaksasi</h3>
                        <a href="#" class="text-sm font-medium text-indigo-600 hover:underline dark:text-indigo-400">Lihat Semua</a>
                    </div>
                    <div class="flex space-x-6 overflow-x-auto pb-4 hide-scroll-bar">
                         @foreach ($audios as $audio)
                            <a href="{{ $audio->content }}" target="_blank" class="flex-shrink-0 w-28 group text-center">
                                <div class="relative">
                                    <img class="w-24 h-24 rounded-full object-cover mx-auto shadow-lg transition-transform duration-300 group-hover:scale-110" src="{{ asset($audio->cover) }}" alt="">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path></svg>
                                    </div>
                                </div>
                                <p class="mt-3 text-sm font-semibold text-gray-800 dark:text-gray-200 truncate group-hover:text-indigo-500 dark:group-hover:text-indigo-400">{{ $audio->title }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Video Edukasi</h3>
                        <a href="#" class="text-sm font-medium text-indigo-600 hover:underline dark:text-indigo-400">Lihat Semua</a>
                    </div>
                    <div class="flex space-x-4 overflow-x-auto pb-4 hide-scroll-bar">
                        <a href="https://www.youtube.com/watch?v=pQnejArI-oA" target="_blank" class="flex-shrink-0 w-72 group">
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="relative">
                                    <img class="h-36 w-full object-cover" src="{{ 'img/tumnail6s.jpg' }}" alt="">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"></path></svg>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <p class="font-semibold text-sm text-gray-900 dark:text-white leading-tight truncate-2-lines group-hover:text-indigo-500 dark:group-hover:text-indigo-400">#UGMPodcast - Mental Health di Kalangan Milenial</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Universitas Gadjah Mada</p>
                                </div>
                            </div>
                        </a>
                        {{-- Kartu video lainnya bisa ditambahkan di sini --}}
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white">Temukan Psikolog</h3>
                        <a href="{{ route('doctors') }}" class="text-sm font-medium text-indigo-600 hover:underline dark:text-indigo-400">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        @foreach ($doctors as $doctor)
                            <a href="{{ route('doctor.show', $doctor->id) }}" class="block group">
                                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-4 flex items-center space-x-4 hover:shadow-lg hover:border-indigo-500 border border-transparent dark:border-gray-700 transition-all duration-300">
                                    <img class="w-20 h-20 rounded-full object-cover flex-shrink-0" src="{{ asset('storage/'.$doctor->photo) }}" alt="">
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900 dark:text-white group-hover:text-indigo-500 dark:group-hover:text-indigo-400">{{ $doctor->name }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $doctor->spesialis }}</p>
                                        <div class="flex items-center mt-2 text-xs text-gray-500 dark:text-gray-400">
                                            <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            <span>4.8 (50+ ulasan)</span>
                                        </div>
                                    </div>
                                    <svg class="w-6 h-6 text-gray-400 group-hover:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- CSS Utility untuk menyembunyikan scrollbar di carousel --}}
    <style>
        .hide-scroll-bar {
            -ms-overflow-style: none; /* IE dan Edge */
            scrollbar-width: none; /* Firefox */
        }
        .hide-scroll-bar::-webkit-scrollbar {
            display: none; /* Chrome, Safari, dan Opera */
        }
        .truncate-2-lines {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>
</x-app-layout>