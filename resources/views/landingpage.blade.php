<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Mymental - Layanan Kesehatan Mental Terpercaya</title>
    <meta name="title" content="Mymental - Layanan Kesehatan Mental Terpercaya">
    <meta name="description" content="Mymental adalah platform kesehatan mental di Indonesia yang menyediakan layanan konseling, konsultasi, dan edukasi esensial bagi remaja.">
    <meta name="author" content="Mymental Team">
    <link rel="canonical" href="https://mymental-app.com/" /> <meta property="og:title" content="Mymental - Layanan Kesehatan Mental Terpercaya">
    <meta property="og:description" content="Temukan dukungan untuk kesehatan mental Anda bersama Mymental. Kami menyediakan konseling, artikel, dan pendampingan profesional.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mymental-app.com/"> <meta property="og:image" content="https://mymental-app.com/og-image.png"> <meta name="twitter:card" content="summary_large_image">
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Konfigurasi tambahan untuk Tailwind jika diperlukan
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            '50': '#f5f3ff',
                            '100': '#ede9fe',
                            '200': '#ddd6fe',
                            '300': '#c4b5fd',
                            '400': '#a78bfa',
                            '500': '#8b5cf6',
                            '600': '#7c3aed',
                            '700': '#6d28d9',
                            '800': '#5b21b6',
                            '900': '#4c1d95',
                        }
                    }
                }
            }
        }
    </script>
    
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="bg-white dark:bg-gray-900">
    <header class="fixed w-full z-50">
        <nav class="bg-white/80 border-gray-200 py-2.5 dark:bg-gray-900/80 backdrop-blur-sm shadow-sm">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="#" class="flex items-center">
                    {{-- <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" class="h-6 mr-3 sm:h-9" alt="Mymental Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mymental</span> --}}
                     <x-application-logo class="block h-24 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="{{ route('login') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 transition-colors">Login</a>
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li><a href="#home" class="block py-2 pl-3 pr-4 text-gray-700 rounded lg:p-0 dark:text-gray-400 lg:dark:hover:text-white hover:text-primary-700" aria-current="page">Home</a></li>
                        <li><a href="#layanan" class="block py-2 pl-3 pr-4 text-gray-700 rounded lg:p-0 dark:text-gray-400 lg:dark:hover:text-white hover:text-primary-700">Layanan</a></li>
                        <li><a href="#artikel" class="block py-2 pl-3 pr-4 text-gray-700 rounded lg:p-0 dark:text-gray-400 lg:dark:hover:text-white hover:text-primary-700">Artikel</a></li>
                        <li><a href="#galeri" class="block py-2 pl-3 pr-4 text-gray-700 rounded lg:p-0 dark:text-gray-400 lg:dark:hover:text-white hover:text-primary-700">Galeri</a></li>
                        <li><a href="#team" class="block py-2 pl-3 pr-4 text-gray-700 rounded lg:p-0 dark:text-gray-400 lg:dark:hover:text-white hover:text-primary-700">Tim Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="bg-white dark:bg-gray-900" id="home">
            <div class="grid max-w-screen-xl px-4 pt-32 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                        Temukan Ketenangan, Jaga Kesehatan Mental Anda.</h1>
                    <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                        Mymental hadir untuk mendukung perjalanan kesehatan mental remaja di Indonesia dengan layanan esensial yang mudah diakses.</p>
                    <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <a href="#layanan" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 transition-colors">
                            Lihat Layanan Kami
                        </a>
                        <a href="#artikel" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800 transition-colors">
                            Baca Artikel
                        </a>
                    </div>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ 'img/photo/heroimage.png' }}" alt="Ilustrasi Kesehatan Mental">
                </div>
            </div>
        </section>

        <section class="bg-gray-50 dark:bg-gray-800" id="layanan">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
                <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-16">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Layanan Kami</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Kami menyediakan berbagai dukungan untuk membantu Anda merasa lebih baik dan lebih sehat secara mental.</p>
                </div>
                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ 'img/icons/FileRichtext.png' }}" alt="Ikon Artikel" class="w-12 h-12 mx-auto mb-4 text-primary-600">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Artikel Kesehatan</h3>
                        <p class="font-light text-gray-500 dark:text-gray-400">Baca wawasan dan tips terbaru seputar kesehatan mental.</p>
                    </div>
                    <div class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ 'img/icons/chat-square-quote.png' }}" alt="Ikon Konsultasi" class="w-12 h-12 mx-auto mb-4 text-primary-600">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Konsultasi Mental</h3>
                        <p class="font-light text-gray-500 dark:text-gray-400">Bicara dengan psikolog profesional kami secara privat.</p>
                    </div>
                    <div class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ 'img/icons/PlayCircle.png' }}" alt="Ikon Video" class="w-12 h-12 mx-auto mb-4 text-primary-600">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Video Edukasi</h3>
                        <p class="font-light text-gray-500 dark:text-gray-400">Tonton video informatif untuk memahami mental Anda.</p>
                    </div>
                    <div class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 transform hover:scale-105 transition-transform duration-300">
                        <img src="{{ 'img/icons/people.png' }}" alt="Ikon Pendampingan" class="w-12 h-12 mx-auto mb-4 text-primary-600">
                        <h3 class="mb-2 text-xl font-bold dark:text-white">Pendampingan Mental</h3>
                        <p class="font-light text-gray-500 dark:text-gray-400">Dapatkan dukungan berkelanjutan dari tim kami.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900" id="artikel">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Artikel Terbaru</h2>
                    <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Beberapa tulisan menarik tentang kesehatan mental yang perlu Anda tahu.</p>
                </div> 
                <div class="grid gap-8 lg:grid-cols-2">
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                            <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                Tips
                            </span>
                            <span class="text-sm">5 hari lalu</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">5 Tips Menjaga Kesehatan Mental di Era Digital</a></h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">Kesejahteraan tidak hanya tergantung pada kesehatan fisik, mental pun sama pentingnya. Di tengah kesibukan, berikut cara sederhana merawatnya.</p>
                        <div class="flex justify-between items-center">
                            <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Baca selengkapnya
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </article> 
                    <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-500">
                             <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                Edukasi
                            </span>
                            <span class="text-sm">8 hari lalu</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">Memahami Perbedaan Psikolog dan Psikiater</a></h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">Sering tertukar, padahal keduanya punya peran berbeda dalam membantu masalah kejiwaan. Kenali perbedaannya agar Anda tidak salah pilih.</p>
                        <div class="flex justify-between items-center">
                            <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                                Baca selengkapnya
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </article>
                </div>  
            </div>
        </section>

        <section class="bg-gray-50 dark:bg-gray-800" id="galeri">
            <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
                <div class="max-w-screen-md mx-auto mb-8 lg:mb-16">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Galeri Mymental</h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Momen aktivitas tim Mymental dalam menyebarkan kesadaran pentingnya kesehatan mental bagi remaja Indonesia.</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div><img class="h-auto max-w-full rounded-lg shadow-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="Galeri Mymental 1"></div>
                    <div><img class="h-auto max-w-full rounded-lg shadow-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="Galeri Mymental 2"></div>
                    <div><img class="h-auto max-w-full rounded-lg shadow-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="Galeri Mymental 3"></div>
                    <div><img class="h-auto max-w-full rounded-lg shadow-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="Galeri Mymental 4"></div>
                    <div><img class="h-auto max-w-full rounded-lg shadow-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="Galeri Mymental 5"></div>
                    <div><img class="h-auto max-w-full rounded-lg shadow-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="Galeri Mymental 6"></div>
                </div>
            </div>
        </section>

        <section class="bg-white dark:bg-gray-900" id="team">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
                <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-16">
                    <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Tim Profesional Kami</h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Orang-orang berdedikasi di balik Mymental yang peduli dengan kesehatan mental Anda.</p>
                </div>
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full object-cover shadow-lg" src="{{ 'img/photo/owner/div.review-author-avatar.png' }}" alt="Danang Pradana Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Danang Pradana</h3>
                        <p class="font-semibold text-primary-600 dark:text-primary-500">CEO</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">5+ tahun pengalaman di social media & digital marketing. COO Quran Review, CMO PT Ruang Halal.</p>
                    </div>
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full object-cover shadow-lg" src="{{ 'img/photo/owner/div.review-author-avatar-1.png' }}" alt="Dr. Haris Alwafi Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Dr. Haris Alwafi</h3>
                        <p class="font-semibold text-primary-600 dark:text-primary-500">CTO</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">5+ tahun pengalaman di app development & medical doctor. Founder Kulinerku.</p>
                    </div>
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full object-cover shadow-lg" src="{{ 'img/photo/owner/div.review-author-avatar-2.png' }}" alt="M. Fayyaz Syauqi Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">M. Fayyaz Syauqi</h3>
                        <p class="font-semibold text-primary-600 dark:text-primary-500">CMO</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">3+ tahun pengalaman sebagai product designer. Mahasiswa Institut Seni Indonesia Yogyakarta.</p>
                    </div>
                    <div class="text-center text-gray-500 dark:text-gray-400">
                        <img class="mx-auto mb-4 w-36 h-36 rounded-full object-cover shadow-lg" src="{{ 'img/photo/owner/ownwr2.png' }}" alt="Yuni Lestari Avatar">
                        <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Yuni Lestari, M.Psi.</h3>
                        <p class="font-semibold text-primary-600 dark:text-primary-500">CPO & Psikolog</p>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">4+ tahun pengalaman konsultasi psikologi. Tim Psikolog HIMPSI DIY, Associate Psychologist.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-50 dark:bg-gray-800">
            <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
                <div class="max-w-screen-sm mx-auto text-center">
                    <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">Siap Merasa Lebih Baik?</h2>
                    <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Jangan ragu untuk mengambil langkah pertama. Tim kami siap membantu Anda. Hubungi kami sekarang untuk konsultasi.</p>
                    <a href="https://wa.me/6285179770559" target="_blank" rel="noopener noreferrer" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 transition-colors">
                        Hubungi Tim Mymental
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-white dark:bg-gray-800" id="contact">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Mymental</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4"><a href="#team" class="hover:underline">Tentang Kami</a></li>
                        <li class="mb-4"><a href="#layanan" class="hover:underline">Layanan</a></li>
                        <li class="mb-4"><a href="#artikel" class="hover:underline">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Dukungan</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4"><a href="#" class="hover:underline">Pusat Bantuan</a></li>
                        <li class="mb-4"><a href="https://wa.me/6285179770559" target="_blank" class="hover:underline">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4"><a href="#" class="hover:underline">Kebijakan Privasi</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Ikuti Kami</h3>
                     <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4"><a href="#" class="hover:underline">Instagram</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Twitter</a></li>
                        <li class="mb-4"><a href="#" class="hover:underline">Facebook</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="text-center">
                <a href="#" class="flex items-center justify-center mb-5 text-2xl font-semibold text-gray-900 dark:text-white">
                     {{-- <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" class="h-8 mr-3" alt="Mymental Logo" /> --}}
                     <x-application-logo class="block h-24 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    {{-- Mymental --}}
                </a>
                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2024-2025 <a href="#" class="hover:underline">Mymental™</a>. All Rights Reserved.</span>
            </div>
        </div>
    </footer>
    
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</body>

</html>