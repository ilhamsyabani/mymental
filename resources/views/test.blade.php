<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mymental - Ruang Aman untuk Kesejahteraan Mental Anda</title>

    {{-- Meta tags, favicons, etc. --}}
    <meta name="description"
        content="Mymental adalah platform kesehatan mental terpercaya di Indonesia yang menyediakan layanan konseling, konsultasi, dan edukasi esensial untuk mendukung perjalanan Anda.">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

    {{-- Scripts & Styles --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,700,900&display=swap" rel="stylesheet" />

    {{-- Font Awesome for social icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js" defer></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js" defer></script>

    <style>
        body {
            font-family: "DM Sans", sans-serif;
        }

        /* --- ANIMASI BARU YANG LEBIH BAIK --- */
        @keyframes blob {
            0% {
                transform: translate(0px, 0px) scale(1);
            }

            33% {
                transform: translate(30px, -50px) scale(1.1);
            }

            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }

            100% {
                transform: translate(0px, 0px) scale(1);
            }
        }

        .animate-blob {
            animation: blob 10s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        /* Sistem animasi on-scroll yang efisien */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(25px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .animate-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="bg-white text-gray-800 antialiased">

    <header class="main-header sticky top-0 z-40 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-4">
                <a href="./" class="flex items-center">
                    <x-application-logo class="block h-12 w-auto fill-current" />
                </a>
                <div class="hidden lg:flex lg:gap-8 items-center">
                    <ul class="flex space-x-8 text-base font-medium text-gray-700">
                        <li><a href="#layanan" class="hover:text-indigo-600 transition-colors">Layanan</a></li>
                        <li><a href="#artikel" class="hover:text-indigo-600 transition-colors">Artikel</a></li>
                        <li><a href="#tim" class="hover:text-indigo-600 transition-colors">Tim Kami</a></li>
                        <li><a href="#galeri" class="hover:text-indigo-600 transition-colors">Galeri</a></li>
                    </ul>
                    <a href="{{ route('login') }}"
                        class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all duration-300 transform hover:-translate-y-0.5">
                        Mulai Konsultasi
                    </a>
                </div>
                <button class="lg:hidden focus:outline-none">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <main>
        <section
            class="hero min-h-screen bg-gradient-to-br from-indigo-50 to-white flex items-center py-20 relative overflow-hidden">
            <div class="absolute inset-0">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob">
                </div>
                <div
                    class="absolute top-0 right-0 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000">
                </div>
                <div
                    class="absolute bottom-0 left-1/2 w-80 h-80 bg-fuchsia-100 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="animate-on-scroll">
                        <h3 class="text-indigo-600 font-bold mb-4 text-lg tracking-wider">
                            PRIORITASKAN KESEHATAN MENTAL ANDA
                        </h3>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight text-gray-900">
                            Layanan Profesional untuk <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Kesejahteraan
                                Mental</span> Anda
                        </h1>
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed">
                            Kami menyediakan dukungan ahli, bimbingan, dan ruang aman untuk membantu Anda menavigasi
                            setiap langkah perjalanan kesehatan mental.
                        </p>
                        <div class="flex flex-wrap gap-4 mb-10">
                            <a href="{{ route('login') }}"
                                class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-bold hover:shadow-lg hover:shadow-indigo-200 transition-all duration-300 transform hover:-translate-y-1">
                                Mulai Sekarang
                            </a>
                            <a href="#tim"
                                class="px-8 py-4 border-2 border-indigo-200 text-indigo-600 rounded-xl font-bold hover:bg-indigo-50 transition-all duration-300 transform hover:-translate-y-1">
                                Kenali Tim Kami
                            </a>
                        </div>
                    </div>
                    <div class="relative animate-on-scroll" style="transition-delay: 150ms;">
                        <div class="rounded-2xl overflow-hidden shadow-2xl shadow-indigo-200/50 border-8 border-white">
                            <img src="https://images.unsplash.com/photo-1739285388427-d6f85d12a8fc?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                alt="Seorang profesional kesehatan mental yang ramah"
                                class="w-full h-auto object-cover transition duration-500 hover:scale-105"
                                style="max-height: 600px;" />
                        </div>
                        <div class="absolute -top-8 -right-8 bg-white p-5 rounded-2xl shadow-xl animate-on-scroll"
                            style="transition-delay: 400ms;">
                            <div class="flex items-center">
                                <div class="mr-4 bg-green-100 p-3 rounded-full">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-green-600"><path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498 1.307A4.49 4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549 3.397 4.491 4.491 0 0 1-5.002 1.307 4.49 4.49 0 0 1-3.397 1.549 4.49 4.49 0 0 1-3.397-1.549 4.49 4.49 0 0 1-1.307-3.498A4.49 4.49 0 0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 0 1 3.498-1.307 4.491 4.491 0 0 1 1.307 3.497ZM15.75 9.75a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75h-4.5a.75.75 0 0 1-.75-.75v-.008a.75.75 0 0 1 .75-.75h4.5Z" clip-rule="evenodd" /></svg> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 text-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                    </svg>

                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-indigo-600">3500+</h3>
                                    <p class="text-sm text-gray-500 font-medium">Klien Puas</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -bottom-8 -left-8 bg-white p-5 rounded-2xl shadow-xl w-64 animate-on-scroll"
                            style="transition-delay: 550ms;">
                            <p class="text-gray-600 mb-3 italic text-sm">"Layanan yang sangat membantu. Konselornya
                                profesional dan empatik."</p>
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/women/33.jpg"
                                    class="w-8 h-8 rounded-full mr-2 border-2 border-indigo-100" alt="Foto Klien">
                                <span class="text-sm font-medium text-gray-700">Sarah, 28</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="layanan" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center mb-16 animate-on-scroll">
                    <h3 class="text-indigo-600 font-bold mb-4 text-lg">LAYANAN KAMI</h3>
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-gray-900">Dirancang untuk Mendukung Anda
                    </h2>
                    <p class="text-gray-600 text-lg">Kami menyediakan beragam layanan untuk menemani setiap fase
                        perjalanan kesehatan mental Anda.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @php
                        $services = [
                            [
                                'icon' =>
                                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" /></svg>',
                                'title' => 'Konsultasi Privat',
                                'desc' =>
                                    'Sesi rahasia 1-on-1 dengan psikolog ahli untuk mengatasi tantangan yang Anda hadapi secara personal.',
                            ],
                            [
                                'icon' =>
                                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg>',
                                'title' => 'Artikel & Wawasan',
                                'desc' =>
                                    'Jelajahi ratusan artikel dan panduan mendalam yang ditulis para ahli untuk memperkaya pemahaman Anda.',
                            ],
                            [
                                'icon' =>
                                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" /></svg>',
                                'title' => 'Video Edukasi',
                                'desc' =>
                                    'Belajar sesuai kecepatan Anda dengan koleksi video edukasi kami yang informatif dan mudah dipahami.',
                            ],
                            [
                                'icon' =>
                                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.286Z" /></svg>',
                                'title' => 'Pendampingan',
                                'desc' =>
                                    'Program pendampingan berkelanjutan untuk memastikan Anda tidak pernah merasa sendirian dalam perjalanan ini.',
                            ],
                        ];
                    @endphp
                    @foreach ($services as $index => $service)
                        <div class="bg-gray-50/70 p-8 rounded-xl transition-all duration-300 hover:shadow-xl hover:bg-white hover:-translate-y-2 animate-on-scroll"
                            style="transition-delay: {{ $index * 100 }}ms;">
                            <div
                                class="icon-box mb-5 bg-indigo-100 text-indigo-600 w-16 h-16 rounded-2xl flex items-center justify-center">
                                {!! $service['icon'] !!}
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $service['title'] }}</h3>
                            <p class="text-gray-600">{{ $service['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="artikel" class="py-20 bg-indigo-50/50">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center mb-16 animate-on-scroll">
                    <h3 class="text-indigo-600 font-bold mb-4 text-lg">ARTIKEL & WAWASAN</h3>
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-gray-900">Informasi Terkini untuk
                        Kesehatan Anda</h2>
                    <p class="text-gray-600 text-lg">Dapatkan tips, wawasan, dan berita terbaru seputar kesehatan
                        mental langsung dari para ahli kami.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($posts as $index => $post)
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-indigo-200/50 transition-all duration-300 animate-on-scroll hover:-translate-y-2"
                            style="transition-delay: {{ $index * 100 }}ms;">
                            <div class="overflow-hidden">
                                <a href="{{ route('articles.show', $post->slug) }}" class="block">
                                    <div class="h-56 w-full overflow-hidden">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                            class="w-full h-full object-cover transition duration-500 hover:scale-110">
                                    </div>
                                </a>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <span class="text-indigo-600 font-semibold">{{ $post->user->name }}</span>
                                    <span class="mx-2">&bull;</span>
                                    <span>{{ $post->published_at }}</span>
                                </div>
                                <h2
                                    class="text-xl font-bold text-gray-800 hover:text-indigo-600 transition mb-4 h-14 overflow-hidden">
                                    <a
                                        href="{{ route('articles.show', $post->slug) }}">{{ Str::limit($post->title, 50) }}</a>
                                </h2>
                                <a href="{{ route('articles.show', $post->slug) }}"
                                    class="inline-flex items-center text-indigo-600 font-bold hover:text-indigo-800 transition group">
                                    Baca Selengkapnya
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 ml-1 group-hover:translate-x-1 transition-transform"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-3 text-center p-8 text-slate-500">
                            Belum ada artikel yang dipublikasikan.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="galeri" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center mb-16 animate-on-scroll">
                    <h3 class="text-indigo-600 font-bold mb-4 text-lg">GALERI KAMI</h3>
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-gray-900">Mengabadikan Momen Penuh
                        Kepedulian</h2>
                    <p class="text-gray-600 text-lg">Lihat lebih dekat fasilitas kami, tim profesional, serta momen
                        hangat dalam proses perawatan klien kami.</p>
                </div>
                <!-- Gallery Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Gallery Item 1 -->
                    <div
                        class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Modern hospital facility"
                            class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-white text-center p-4">
                                <h3 class="text-xl font-bold mb-2">Modern Facility</h3>
                                <p class="text-sm">Our state-of-the-art hospital building</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Item 2 -->
                    <div
                        class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1581056771107-24ca5f033842?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Medical team discussion"
                            class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-white text-center p-4">
                                <h3 class="text-xl font-bold mb-2">Team Discussion</h3>
                                <p class="text-sm">Our specialists consulting on a case</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Item 3 -->
                    <div
                        class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Advanced medical equipment"
                            class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-white text-center p-4">
                                <h3 class="text-xl font-bold mb-2">Advanced Equipment</h3>
                                <p class="text-sm">Our cutting-edge diagnostic machines</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Item 4 -->
                    <div
                        class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Doctor with patient"
                            class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-white text-center p-4">
                                <h3 class="text-xl font-bold mb-2">Patient Care</h3>
                                <p class="text-sm">Doctor consulting with a patient</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Item 5 -->
                    <div
                        class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Surgery room"
                            class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-white text-center p-4">
                                <h3 class="text-xl font-bold mb-2">Surgery Room</h3>
                                <p class="text-sm">Our modern operating theater</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Item 6 -->
                    <div
                        class="gallery-item group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                            alt="Medical conference"
                            class="w-full h-64 object-cover transition duration-500 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="text-white text-center p-4">
                                <h3 class="text-xl font-bold mb-2">Medical Conference</h3>
                                <p class="text-sm">Our team at a health seminar</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="tim" class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl mx-auto text-center mb-16 animate-on-scroll">
                    <h3 class="text-indigo-600 font-bold mb-4 text-lg">TIM AHLI KAMI</h3>
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-gray-900">Para Ahli Penuh Empati yang Siap
                        Membantu</h2>
                    <p class="text-gray-600 text-lg">Tim kami menyatukan kekayaan pengalaman, semangat, dan dedikasi
                        untuk memberikan perawatan terbaik bagi Anda.</p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @php
                        $team = [
                            [
                                'name' => 'Danang Pradana',
                                'role' => 'CEO & Founder',
                                'image' => 'https://images.unsplash.com/photo-1610088441520-4352457e7095?q=80&w=1587&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                                'desc' =>
                                    'Memimpin dengan visi kesehatan mental yang inovatif dan berpusat pada klien.',
                            ],
                            [
                                'name' => 'Dr. Haris Alwafi',
                                'role' => 'Chief Technology Officer',
                                'image' => '/img/photo/haris.png',
                                'desc' => 'Ahli teknologi yang memastikan platform kami aman dan mudah diakses.',
                            ],
                            [
                                'name' => 'M. Fayyaz Syauqi',
                                'role' => 'Chief Marketing Officer',
                                'image' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=800',
                                'desc' =>
                                    'Spesialis komunikasi yang berdedikasi menyebarkan kesadaran kesehatan mental.',
                            ],
                            [
                                'name' => 'Yuni Lestari, M.Psi.',
                                'role' => 'CPO & Psikolog Klinis',
                                'image' => '/img/photo/yuni.png',
                                'desc' => 'Psikolog klinis dengan pendekatan holistik untuk kesejahteraan Anda.',
                            ],
                        ];
                    @endphp
                    @foreach ($team as $index => $member)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 animate-on-scroll"
                            style="transition-delay: {{ $index * 100 }}ms;">
                            <div class="relative overflow-hidden group h-80">
                                <img src="{{ $member['image'] }}" alt="Foto {{ $member['name'] }}"
                                    class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent flex items-end justify-center pb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="flex space-x-3">
                                        <a href="#"
                                            class="bg-white w-9 h-9 rounded-full flex items-center justify-center text-indigo-600 hover:bg-indigo-600 hover:text-white transition"><i
                                                class="fab fa-instagram text-sm"></i></a>
                                        <a href="#"
                                            class="bg-white w-9 h-9 rounded-full flex items-center justify-center text-indigo-600 hover:bg-indigo-600 hover:text-white transition"><i
                                                class="fab fa-linkedin-in text-sm"></i></a>
                                        <a href="#"
                                            class="bg-white w-9 h-9 rounded-full flex items-center justify-center text-indigo-600 hover:bg-indigo-600 hover:text-white transition"><i
                                                class="fas fa-envelope text-sm"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $member['name'] }}</h3>
                                <p class="text-indigo-600 font-medium mb-3">{{ $member['role'] }}</p>
                                <div class="h-px w-16 bg-indigo-100 mx-auto mb-3"></div>
                                <p class="text-sm text-gray-500">{{ $member['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="cta-section relative py-28 bg-gradient-to-r from-indigo-700 to-purple-800 overflow-hidden">
            <div class="absolute -top-20 -left-20 w-64 h-64 rounded-full bg-white opacity-5 animate-blob"></div>
            <div
                class="absolute -bottom-20 -right-20 w-80 h-80 rounded-full bg-white opacity-5 animate-blob animation-delay-2000">
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-3xl mx-auto text-center animate-on-scroll">
                    <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 rounded-full mb-6">
                        <span class="text-white text-sm font-medium">Kami Peduli, Kami Siap Membantu</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                        Siap Mengambil Langkah Menuju Kesejahteraan Mental?
                    </h2>
                    <p class="text-indigo-100 text-lg mb-10 max-w-2xl mx-auto">
                        Para profesional kami siap mendampingi Anda meraih ketenangan. Jadwalkan konsultasi Anda hari
                        ini dan rasakan layanan yang penuh empati dan mendukung.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="https://wa.me/6285179770559?text=Halo%20Admin%20Mymental%2C%20saya%20tertarik%20untuk%20berkonsultasi."
                            target="_blank"
                            class="flex items-center px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fab fa-whatsapp h-6 w-6 mr-2"></i> Hubungi via WhatsApp
                        </a>
                        <a href="{{ route('login') }}"
                            class="px-8 py-4 border-2 border-white/50 text-white rounded-xl font-bold hover:bg-white hover:text-indigo-600 transition-all duration-300 transform hover:-translate-y-1">
                            Pesan Jadwal Online
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer id="kontak" class="bg-slate-800 text-slate-400">
        <div class="container mx-auto py-16 px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="col-span-2 md:col-span-1">
                    <x-application-logo class="block h-12 w-auto fill-current" />
                    <p class="mt-4 text-sm">Platform dukungan kesehatan mental terpercaya di Indonesia.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-white uppercase tracking-wider">Navigasi</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#layanan" class="hover:text-white transition">Layanan</a></li>
                        <li><a href="#artikel" class="hover:text-white transition">Artikel</a></li>
                        <li><a href="#tim" class="hover:text-white transition">Tim Kami</a></li>
                        <li><a href="#galeri" class="hover:text-white transition">Galeri</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-white uppercase tracking-wider">Dukungan</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-white transition">Hubungi Kami</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-white uppercase tracking-wider">Legal</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 pt-8 border-t border-slate-700 text-center text-sm">
                <p>&copy; {{ date('Y') }} Mymental™. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
            elementsToAnimate.forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>

</html>
