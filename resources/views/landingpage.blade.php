<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mymental - Jaga Kesehatan Mental Anda</title>

    {{-- Meta tags, favicons, etc. --}}
    <meta name="description"
        content="Mymental adalah platform kesehatan mental di Indonesia yang menyediakan layanan konseling, konsultasi, dan edukasi esensial bagi remaja.">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">

    {{-- Scripts & Styles --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <style>
        /* Menggunakan font Inter untuk tampilan yang lebih modern */
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Efek gradien bergerak untuk latar belakang hero */
        .animated-gradient {
            background: linear-gradient(-45deg, #8b5cf6, #6d28d9, #4c1d95, #3730a3);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="bg-slate-50 dark:bg-slate-900 text-slate-800 dark:text-slate-200">

    <header x-data="{ atTop: true }" @scroll.window="atTop = (window.scrollY > 10)"
        class="fixed w-full z-50 transition-all duration-300"
        :class="{ 'bg-white/80 dark:bg-slate-900/80 backdrop-blur-sm shadow-md': !atTop, 'bg-transparent': atTop }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="#home">
                    <x-application-logo class="block h-12 w-auto fill-current" />
                </a>
                <nav class="hidden md:flex space-x-8">
                    <a href="#layanan" class="font-medium hover:text-indigo-500 transition-colors">Layanan</a>
                    <a href="#artikel" class="font-medium hover:text-indigo-500 transition-colors">Artikel</a>
                    <a href="#team" class="font-medium hover:text-indigo-500 transition-colors">Tim Kami</a>
                    <a href="#contact" class="font-medium hover:text-indigo-500 transition-colors">Kontak</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}"
                        class="px-5 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all transform hover:scale-105">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="home" class="relative bg-indigo-700 overflow-hidden">
            <div class="absolute inset-0 animated-gradient"></div>
            <div class="absolute inset-0 bg-black/30"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 min-h-screen items-center pt-24 lg:pt-0">

                    <div class="lg:col-span-6 text-center lg:text-left">
                        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-white drop-shadow-lg">
                            Kesehatan Mental Anda Adalah Prioritas
                        </h1>
                        <p class="mt-6 max-w-2xl mx-auto lg:mx-0 text-lg md:text-xl text-indigo-100 drop-shadow-md">
                            Mymental hadir untuk memberikan dukungan, bimbingan, dan ruang aman bagi perjalanan
                            kesehatan mental Anda.
                        </p>
                        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                            <a href="{{ route('register') }}"
                                class="w-full sm:w-auto px-8 py-3 bg-white text-indigo-600 font-bold rounded-full shadow-lg hover:bg-indigo-100 transition-all transform hover:scale-105">
                                Mulai Konsultasi
                            </a>
                            <a href="#layanan"
                                class="w-full sm:w-auto px-8 py-3 bg-transparent text-white font-semibold rounded-full border-2 border-white hover:bg-white/20 transition-all">
                                Lihat Layanan
                            </a>
                        </div>
                    </div>

                    <div class="hidden lg:flex lg:col-span-6 justify-center">
                        <img src="{{ asset('img/photo/heroimage.png') }}" alt="Ilustrasi Kesehatan Mental"
                            class="w-full max-w-lg h-auto object-contain drop-shadow-2xl">

                    </div>

                </div>
            </div>
        </section>

        <section id="layanan" class="py-20 sm:py-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Layanan Unggulan Kami</h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">Dirancang untuk memenuhi setiap kebutuhan
                        perjalanan mental Anda.</p>
                </div>
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div
                        class="p-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border dark:border-slate-700 transform hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M16.53 11.06L15.47 10L12 13.47L8.53 10L7.47 11.06L12 15.59L16.53 11.06ZM12 4C7.59 4 4 7.59 4 12C4 16.41 7.59 20 12 20C16.41 20 20 16.41 20 12C20 7.59 16.41 4 12 4ZM12 18C8.69 18 6 15.31 6 12C6 8.69 8.69 6 12 6C15.31 6 18 8.69 18 12C18 15.31 15.31 18 12 18Z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold">Konsultasi Privat</h3>
                        <p class="mt-2 text-slate-600 dark:text-slate-400">Sesi 1-on-1 dengan psikolog profesional kami.
                        </p>
                    </div>
                    <div
                        class="p-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border dark:border-slate-700 transform hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2ZM12 20c-4.41 0-8-3.59-8-8s3.59-8 8-8s8 3.59 8 8s-3.59 8-8-8ZM8 11h8v2H8v-2Z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold">Artikel & Wawasan</h3>
                        <p class="mt-2 text-slate-600 dark:text-slate-400">Akses perpustakaan artikel kesehatan mental.
                        </p>
                    </div>
                    <div
                        class="p-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border dark:border-slate-700 transform hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2ZM10 16.5v-9l6 4.5l-6 4.5Z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold">Video Edukasi</h3>
                        <p class="mt-2 text-slate-600 dark:text-slate-400">Konten video menarik untuk pembelajaran
                            mandiri.</p>
                    </div>
                    <div
                        class="p-8 bg-white dark:bg-slate-800 rounded-2xl shadow-lg border dark:border-slate-700 transform hover:-translate-y-2 transition-transform duration-300">
                        <div
                            class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 rounded-lg flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2ZM17 13h-4v4h-2v-4H7v-2h4V7h2v4h4v2Z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold">Pendampingan</h3>
                        <p class="mt-2 text-slate-600 dark:text-slate-400">Dukungan berkelanjutan untuk perjalanan Anda.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="artikel" class="py-20 sm:py-28 bg-slate-100 dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Artikel Terbaru dari Blog Kami</h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">Wawasan baru untuk membantu Anda lebih
                        memahami diri sendiri.</p>
                </div>
                <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @forelse ($posts as $post)
                        <a href="{{ route('articles.show', $post->slug) }}"
                            class="block group bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden border dark:border-slate-700 transform hover:-translate-y-2 transition-transform duration-300">
                            <img class="w-full h-40 object-cover" src="{{ asset('storage/' . $post->image) }}"
                                alt="Gambar {{ $post->title }}">
                            <div class="p-6">
                                <p class="text-sm font-semibold text-indigo-500">{{ $post->user->name }} &bull;
                                    {{ $post->published_at }}</p>
                                <h3 class="mt-2 text-lg font-bold group-hover:text-indigo-500 transition-colors">
                                    {{ $post->title }}</h3>
                            </div>
                        </a>
                    @empty
                        <div class="md:col-span-2 lg:col-span-4 text-center p-8 text-slate-500">
                            Belum ada artikel yang dipublikasikan.
                        </div>
                    @endforelse
                </div>
                <div class="mt-16 text-center">
                    <a href="{{ route('articles') }}"
                        class="px-8 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition-all">
                        Lihat Semua Artikel
                    </a>
                </div>
            </div>
        </section>

        <section id="galeri" class="py-12 sm:py-18 bg-slate-100 dark:bg-slate-950">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Galeri Kegiatan Mymental</h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">Momen kebersamaan dalam membangun
                        kesadaran dan dukungan kesehatan mental.</p>
                </div>

                <div class="mt-16 columns-2 md:columns-3 lg:columns-4 gap-4 sm:gap-6">

                    {{-- Ganti URL gambar di bawah ini dengan foto-foto Anda sendiri nanti --}}

                    <div class="mb-4 sm:mb-6 break-inside-avoid">
                        <img class="w-full h-auto object-cover rounded-xl shadow-lg transition-transform duration-300 hover:scale-105"
                            src="https://images.unsplash.com/photo-1544006659-f0b21884ce1d?q=80&w=1918&auto=format&fit=crop"
                            alt="Kegiatan komunitas kesehatan mental">
                    </div>

                    <div class="mb-4 sm:mb-6 break-inside-avoid">
                        <img class="w-full h-auto object-cover rounded-xl shadow-lg transition-transform duration-300 hover:scale-105"
                            src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=2080&auto=format&fit=crop"
                            alt="Sesi konseling kelompok">
                    </div>



                    <div class="mb-4 sm:mb-6 break-inside-avoid">
                        <img class="w-full h-auto object-cover rounded-xl shadow-lg transition-transform duration-300 hover:scale-105"
                            src="https://images.unsplash.com/photo-1594824476967-48c8b964273f?q=80&w=1974&auto=format&fit=crop"
                            alt="Sesi meditasi bersama">
                    </div>


                    <div class="mb-4 sm:mb-6 break-inside-avoid">
                        <img class="w-full h-auto object-cover rounded-xl shadow-lg transition-transform duration-300 hover:scale-105"
                            src="https://images.unsplash.com/photo-1593341646782-e0b495cff86d?q=80&w=1968&auto=format&fit=crop"
                            alt="Seminar kesehatan mental">
                    </div>
                </div>
            </div>
        </section>

        <section id="team" class="py-20 sm:py-28">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Temui Tim Profesional Kami</h2>
                    <p class="mt-4 text-lg text-slate-600 dark:text-slate-400">Para ahli yang berdedikasi dan peduli
                        dengan kesejahteraan Anda.</p>
                </div>
                <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="text-center">
                        <img class="mx-auto mb-4 w-40 h-40 rounded-full object-cover shadow-2xl"
                            src="{{ 'img/photo/owner/div.review-author-avatar.png' }}" alt="Danang Pradana">
                        <h3 class="text-xl font-bold">Danang Pradana</h3>
                        <p class="font-semibold text-indigo-500">CEO</p>
                    </div>
                    <div class="text-center">
                        <img class="mx-auto mb-4 w-40 h-40 rounded-full object-cover shadow-2xl"
                            src="{{ 'img/photo/owner/div.review-author-avatar-1.png' }}" alt="Dr. Haris Alwafi">
                        <h3 class="text-xl font-bold">Dr. Haris Alwafi</h3>
                        <p class="font-semibold text-indigo-500">CTO</p>
                    </div>
                    <div class="text-center">
                        <img class="mx-auto mb-4 w-40 h-40 rounded-full object-cover shadow-2xl"
                            src="{{ 'img/photo/owner/div.review-author-avatar-2.png' }}" alt="M. Fayyaz Syauqi">
                        <h3 class="text-xl font-bold">M. Fayyaz Syauqi</h3>
                        <p class="font-semibold text-indigo-500">CMO</p>
                    </div>
                    <div class="text-center">
                        <img class="mx-auto mb-4 w-40 h-40 rounded-full object-cover shadow-2xl"
                            src="{{ 'img/photo/owner/ownwr2.png' }}" alt="Yuni Lestari, M.Psi.">
                        <h3 class="text-xl font-bold">Yuni Lestari, M.Psi.</h3>
                        <p class="font-semibold text-indigo-500">CPO & Psikolog</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative py-20 sm:py-28 bg-indigo-700 overflow-hidden">
            <div class="absolute inset-0">
                <div
                    class="absolute inset-0 bg-indigo-800 opacity-20 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]">
                </div>
                <div
                    class="absolute inset-0 bg-indigo-800 opacity-20 [mask-image:radial-gradient(100%_100%_at_bottom_left,white,transparent)]">
                </div>
            </div>

            <div class="relative max-w-4xl mx-auto text-center px-4 z-10">
                <h2 class="text-3xl md:text-4xl font-bold text-white">
                    Siap Mengambil Langkah Pertama?
                </h2>
                <p class="mt-4 text-lg text-indigo-200 max-w-2xl mx-auto">
                    Perjalanan Anda menuju ketenangan dimulai di sini. Tim kami siap mendampingi Anda di setiap langkah.
                </p>
                <div class="mt-10">
                    <a href="https://wa.me/6285179770559?text=Halo%20Admin%20Mymental%2C%20saya%20tertarik%20untuk%20mendaftar%20dan%20ingin%20bertanya%20lebih%20lanjut."
                        target="_blank"
                        class="inline-block px-10 py-4 bg-white text-indigo-600 font-bold rounded-full shadow-lg hover:bg-indigo-100 transition-all transform hover:scale-105">
                        Hubungi Kami via WhatsApp
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer id="contact" class="bg-slate-800 text-slate-400">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="col-span-2 md:col-span-1">
                    <x-application-logo class="block h-12 w-auto fill-current" />
                    <p class="mt-4 text-sm">Platform dukungan kesehatan mental terpercaya di Indonesia.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-white uppercase">Navigasi</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#layanan" class="hover:text-white">Layanan</a></li>
                        <li><a href="#artikel" class="hover:text-white">Artikel</a></li>
                        <li><a href="#team" class="hover:text-white">Tim Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-white uppercase">Dukungan</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-white">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-white uppercase">Legal</h3>
                    <ul class="mt-4 space-y-2 text-sm">
                        <li><a href="#" class="hover:text-white">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:text-white">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 pt-8 border-t border-slate-700 text-center text-sm">
                <p>&copy; {{ date('Y') }} Mymental™. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <div x-data="{ show: false }" @scroll.window="show = (window.scrollY > 400)" x-cloak
        class="fixed bottom-5 right-5 z-50">
        <button x-show="show" @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="p-3 bg-indigo-600 text-white rounded-full shadow-lg hover:bg-indigo-700 transition">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path
                    d="M11.9999 10.8284L7.05021 15.7782L5.63599 14.364L11.9999 8L18.3639 14.364L16.9497 15.7782L11.9999 10.8284Z">
                </path>
            </svg>
        </button>
    </div>

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</body>

</html>
