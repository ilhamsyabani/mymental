<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="canonical" href="https://https://demo.themesberg.com/landwind/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landwind - Tailwind CSS Landing Page Demo</title>

    <!-- Meta SEO -->
    <meta name="title" content="Landwind - Tailwind CSS Landing Page">
    <meta name="description"
        content="Get started with a free and open-source landing page built with Tailwind CSS and the Flowbite component library.">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Themesberg">

    <!-- Social media share -->
    <meta property="og:title" content=Landwind - Tailwind CSS Landing Page>
    <meta property="og:site_name" content=Themesberg>
    <meta property="og:url" content=https://https://demo.themesberg.com/landwind />
    <meta property="og:description" content=Get started with a free and open-source landing page for Tailwind CSS built
        with the Flowbite component library featuring dark mode, hero sections, pricing cards, and more.>
    <meta property="og:type" content="">
    <meta property="og:image" content=https://themesberg.s3.us-east-2.amazonaws.com/public/github/landwind/og-image.png>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@themesberg" />
    <meta name="twitter:creator" content="@themesberg" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="./output.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>

<body>
    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="#" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="{{ route('login') }}"
                        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">login</a>
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Layanan
                                Kami</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Galeri</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Team</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-8 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-32">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                    Layanan Konseling <br>dan Konsultasi.</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Mymental adalah Platform Penunjang Kesehatan mental di Indonesia dengan mengutamakan memberikan
                    akses kebutuhan layanan esensial bagi remaja dengan permasalahan mental.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="https://themesberg.com/product/tailwind-css/landing-page"
                        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Download</a>
                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ 'img/photo/heroimage.png' }}" alt="hero image">
            </div>
        </div>
    </section>
    <!-- End block -->

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Layanan Kami</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Berikut beberapa layanan yang
                    kami tawarkan untuk membuat mentalmu lebih sehat</p>
            </div>
            <div class="flex-row justify-center items-center gap-10 flex">
                <div
                    class="w-[220px] h-[260px] p-6 bg-white rounded-xl shadow flex-col justify-center items-center gap-6 inline-flex">
                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_153_656)">
                            <path
                                d="M17.5 11.5151C17.5 11.7614 17.4515 12.0052 17.3573 12.2327C17.263 12.4602 17.1249 12.6669 16.9508 12.841C16.7767 13.0151 16.57 13.1532 16.3425 13.2474C16.115 13.3416 15.8712 13.3901 15.625 13.3901C15.3788 13.3901 15.135 13.3416 14.9075 13.2474C14.68 13.1532 14.4733 13.0151 14.2992 12.841C14.1251 12.6669 13.987 12.4602 13.8927 12.2327C13.7985 12.0052 13.75 11.7614 13.75 11.5151C13.75 11.0179 13.9475 10.5409 14.2992 10.1893C14.6508 9.83768 15.1277 9.64014 15.625 9.64014C16.1223 9.64014 16.5992 9.83768 16.9508 10.1893C17.3025 10.5409 17.5 11.0179 17.5 11.5151ZM15.3475 15.3701L18.6725 17.5851L23.3075 12.9476C23.4003 12.8546 23.52 12.7931 23.6497 12.772C23.7795 12.751 23.9125 12.7713 24.03 12.8301L28.75 15.2651V19.6401C28.75 19.9717 28.6183 20.2896 28.3839 20.524C28.1495 20.7584 27.8315 20.8901 27.5 20.8901H12.5C12.1685 20.8901 11.8505 20.7584 11.6161 20.524C11.3817 20.2896 11.25 19.9717 11.25 19.6401V18.3901C11.25 18.3901 15.1 15.2051 15.3475 15.3701ZM12.5 23.3901C12.1685 23.3901 11.8505 23.5218 11.6161 23.7563C11.3817 23.9907 11.25 24.3086 11.25 24.6401C11.25 24.9717 11.3817 25.2896 11.6161 25.524C11.8505 25.7584 12.1685 25.8901 12.5 25.8901H27.5C27.8315 25.8901 28.1495 25.7584 28.3839 25.524C28.6183 25.2896 28.75 24.9717 28.75 24.6401C28.75 24.3086 28.6183 23.9907 28.3839 23.7563C28.1495 23.5218 27.8315 23.3901 27.5 23.3901H12.5ZM12.5 28.3901C12.1685 28.3901 11.8505 28.5218 11.6161 28.7563C11.3817 28.9907 11.25 29.3086 11.25 29.6401C11.25 29.9717 11.3817 30.2896 11.6161 30.524C11.8505 30.7584 12.1685 30.8901 12.5 30.8901H20C20.3315 30.8901 20.6495 30.7584 20.8839 30.524C21.1183 30.2896 21.25 29.9717 21.25 29.6401C21.25 29.3086 21.1183 28.9907 20.8839 28.7563C20.6495 28.5218 20.3315 28.3901 20 28.3901H12.5Z"
                                fill="#542C7C" />
                            <path
                                d="M5 5.89014C5 4.56405 5.52678 3.29228 6.46447 2.3546C7.40215 1.41692 8.67392 0.890137 10 0.890137L30 0.890137C31.3261 0.890137 32.5979 1.41692 33.5355 2.3546C34.4732 3.29228 35 4.56405 35 5.89014V35.8901C35 37.2162 34.4732 38.488 33.5355 39.4257C32.5979 40.3633 31.3261 40.8901 30 40.8901H10C8.67392 40.8901 7.40215 40.3633 6.46447 39.4257C5.52678 38.488 5 37.2162 5 35.8901V5.89014ZM30 3.39014H10C9.33696 3.39014 8.70107 3.65353 8.23223 4.12237C7.76339 4.59121 7.5 5.2271 7.5 5.89014V35.8901C7.5 36.5532 7.76339 37.1891 8.23223 37.6579C8.70107 38.1267 9.33696 38.3901 10 38.3901H30C30.663 38.3901 31.2989 38.1267 31.7678 37.6579C32.2366 37.1891 32.5 36.5532 32.5 35.8901V5.89014C32.5 5.2271 32.2366 4.59121 31.7678 4.12237C31.2989 3.65353 30.663 3.39014 30 3.39014Z"
                                fill="#542C7C" />
                        </g>
                        <defs>
                            <clipPath id="clip0_153_656">
                                <rect width="40" height="40" fill="white"
                                    transform="translate(0 0.890137)" />
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="flex-col justify-center items-center gap-1 flex">
                        <p class="text-center text-neutral-800 text-base font-medium ">Artikel Kesehatan
                            Mental</p>
                    </div>
                    <div
                        class="px-4 py-2 bg-purple-900 rounded-[100px] border border-purple-900 justify-center items-end gap-2.5 inline-flex">
                        <p class="text-white text-xs font-bold ">Info</p>
                    </div>
                </div>
                <div
                    class="w-[220px] h-[260px] p-6 bg-white rounded-xl shadow flex-col justify-center items-center gap-6 inline-flex">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M35 2.5C35.663 2.5 36.2989 2.76339 36.7678 3.23223C37.2366 3.70107 37.5 4.33696 37.5 5V25C37.5 25.663 37.2366 26.2989 36.7678 26.7678C36.2989 27.2366 35.663 27.5 35 27.5H28.75C27.9738 27.5 27.2082 27.6807 26.5139 28.0279C25.8197 28.375 25.2157 28.879 24.75 29.5L20 35.8325L15.25 29.5C14.7843 28.879 14.1803 28.375 13.4861 28.0279C12.7918 27.6807 12.0262 27.5 11.25 27.5H5C4.33696 27.5 3.70107 27.2366 3.23223 26.7678C2.76339 26.2989 2.5 25.663 2.5 25V5C2.5 4.33696 2.76339 3.70107 3.23223 3.23223C3.70107 2.76339 4.33696 2.5 5 2.5H35ZM5 0C3.67392 0 2.40215 0.526784 1.46447 1.46447C0.526784 2.40215 0 3.67392 0 5L0 25C0 26.3261 0.526784 27.5979 1.46447 28.5355C2.40215 29.4732 3.67392 30 5 30H11.25C11.6381 30 12.0209 30.0904 12.368 30.2639C12.7152 30.4375 13.0171 30.6895 13.25 31L18 37.3325C18.2329 37.643 18.5348 37.895 18.882 38.0686C19.2291 38.2421 19.6119 38.3325 20 38.3325C20.3881 38.3325 20.7709 38.2421 21.118 38.0686C21.4652 37.895 21.7671 37.643 22 37.3325L26.75 31C26.9829 30.6895 27.2848 30.4375 27.632 30.2639C27.9791 30.0904 28.3619 30 28.75 30H35C36.3261 30 37.5979 29.4732 38.5355 28.5355C39.4732 27.5979 40 26.3261 40 25V5C40 3.67392 39.4732 2.40215 38.5355 1.46447C37.5979 0.526784 36.3261 0 35 0L5 0Z"
                            fill="#542C7C" />
                        <path
                            d="M17.6651 11.9C17.1781 11.1416 16.4581 10.5617 15.6133 10.2476C14.7686 9.93346 13.8447 9.90199 12.9805 10.1579C12.1163 10.4138 11.3586 10.9433 10.8211 11.6668C10.2837 12.3903 9.99553 13.2687 10.0001 14.17C10.0005 14.9163 10.2014 15.6488 10.5817 16.291C10.962 16.9332 11.5077 17.4614 12.1619 17.8206C12.8162 18.1798 13.5549 18.3567 14.3008 18.3328C15.0468 18.309 15.7726 18.0852 16.4026 17.685C16.0751 18.6575 15.4651 19.695 14.4601 20.735C14.2678 20.9339 14.1624 21.201 14.1671 21.4776C14.1718 21.7542 14.2861 22.0177 14.4851 22.21C14.684 22.4022 14.9511 22.5076 15.2277 22.5029C15.5043 22.4982 15.7678 22.3839 15.9601 22.185C19.6751 18.335 19.1926 14.15 17.6651 11.905V11.9ZM27.6651 11.9C27.1781 11.1416 26.4581 10.5617 25.6133 10.2476C24.7686 9.93346 23.8447 9.90199 22.9805 10.1579C22.1163 10.4138 21.3586 10.9433 20.8211 11.6668C20.2837 12.3903 19.9955 13.2687 20.0001 14.17C20.0005 14.9163 20.2014 15.6488 20.5817 16.291C20.962 16.9332 21.5077 17.4614 22.1619 17.8206C22.8162 18.1798 23.5549 18.3567 24.3008 18.3328C25.0468 18.309 25.7726 18.0852 26.4026 17.685C26.0751 18.6575 25.4651 19.695 24.4601 20.735C24.2678 20.9339 24.1624 21.201 24.1671 21.4776C24.1718 21.7542 24.2861 22.0177 24.4851 22.21C24.684 22.4022 24.9511 22.5076 25.2277 22.5029C25.5043 22.4982 25.7678 22.3839 25.9601 22.185C29.6751 18.335 29.1926 14.15 27.6651 11.905V11.9Z"
                            fill="#542C7C" />
                    </svg>
                    <div class="flex-col justify-center items-center gap-1 flex">
                        <p class="text-center text-neutral-800 text-base font-medium ">Konsultasi
                            Mental</p>
                    </div>
                    <div
                        class="px-4 py-2 bg-purple-900 rounded-[100px] border border-purple-900 justify-center items-end gap-2.5 inline-flex">
                        <p class="text-white text-xs font-bold ">Info</p>
                    </div>
                </div>
                <div
                    class="w-[220px] h-[260px] p-6 bg-white rounded-xl shadow flex-col justify-center items-center gap-6 inline-flex">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_187_610)">
                            <path
                                d="M20 37.5C15.3587 37.5 10.9075 35.6563 7.62563 32.3744C4.34374 29.0925 2.5 24.6413 2.5 20C2.5 15.3587 4.34374 10.9075 7.62563 7.62563C10.9075 4.34374 15.3587 2.5 20 2.5C24.6413 2.5 29.0925 4.34374 32.3744 7.62563C35.6563 10.9075 37.5 15.3587 37.5 20C37.5 24.6413 35.6563 29.0925 32.3744 32.3744C29.0925 35.6563 24.6413 37.5 20 37.5ZM20 40C25.3043 40 30.3914 37.8929 34.1421 34.1421C37.8929 30.3914 40 25.3043 40 20C40 14.6957 37.8929 9.60859 34.1421 5.85786C30.3914 2.10714 25.3043 0 20 0C14.6957 0 9.60859 2.10714 5.85786 5.85786C2.10714 9.60859 0 14.6957 0 20C0 25.3043 2.10714 30.3914 5.85786 34.1421C9.60859 37.8929 14.6957 40 20 40Z"
                                fill="#542C7C" />
                            <path
                                d="M15.6775 12.6375C15.882 12.5322 16.1115 12.4853 16.3409 12.5021C16.5702 12.5189 16.7905 12.5986 16.9775 12.7325L25.7275 18.9825C25.8895 19.0981 26.0216 19.2508 26.1127 19.4277C26.2039 19.6047 26.2514 19.8009 26.2514 20C26.2514 20.199 26.2039 20.3952 26.1127 20.5722C26.0216 20.7492 25.8895 20.9018 25.7275 21.0175L16.9775 27.2675C16.7906 27.4012 16.5704 27.4809 16.3412 27.4977C16.1119 27.5144 15.8825 27.4676 15.6781 27.3625C15.4737 27.2573 15.3023 27.0978 15.1826 26.9016C15.063 26.7053 14.9998 26.4798 15 26.25V13.75C14.9998 13.5202 15.0629 13.2948 15.1824 13.0985C15.3019 12.9022 15.4732 12.7427 15.6775 12.6375Z"
                                fill="#542C7C" />
                        </g>
                        <defs>
                            <clipPath id="clip0_187_610">
                                <rect width="40" height="40" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>

                    <div class="flex-col justify-center items-center gap-1 flex">
                        <p class="text-center text-neutral-800 text-base font-medium ">Video Edukasi Kesehatan Mental
                            Mental</p>
                    </div>
                    <div
                        class="px-4 py-2 bg-purple-900 rounded-[100px] border border-purple-900 justify-center items-end gap-2.5 inline-flex">
                        <p class="text-white text-xs font-bold ">Info</p>
                    </div>
                </div>
                <div
                    class="w-[220px] h-[260px] p-6 bg-white rounded-xl shadow flex-col justify-center items-center gap-6 inline-flex">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M37.5 35C37.5 35 40 35 40 32.5C40 30 37.5 22.5 27.5 22.5C17.5 22.5 15 30 15 32.5C15 35 17.5 35 17.5 35H37.5ZM17.555 32.5L17.5 32.49C17.5025 31.83 17.9175 29.915 19.4 28.19C20.78 26.5725 23.205 25 27.5 25C31.7925 25 34.2175 26.575 35.6 28.19C37.0825 29.915 37.495 31.8325 37.5 32.49L37.48 32.495L37.445 32.5H17.555ZM27.5 17.5C28.8261 17.5 30.0979 16.9732 31.0355 16.0355C31.9732 15.0979 32.5 13.8261 32.5 12.5C32.5 11.1739 31.9732 9.90215 31.0355 8.96447C30.0979 8.02678 28.8261 7.5 27.5 7.5C26.1739 7.5 24.9021 8.02678 23.9645 8.96447C23.0268 9.90215 22.5 11.1739 22.5 12.5C22.5 13.8261 23.0268 15.0979 23.9645 16.0355C24.9021 16.9732 26.1739 17.5 27.5 17.5ZM35 12.5C35 13.4849 34.806 14.4602 34.4291 15.3701C34.0522 16.2801 33.4997 17.1069 32.8033 17.8033C32.1069 18.4997 31.2801 19.0522 30.3701 19.4291C29.4602 19.806 28.4849 20 27.5 20C26.5151 20 25.5398 19.806 24.6299 19.4291C23.7199 19.0522 22.8931 18.4997 22.1967 17.8033C21.5003 17.1069 20.9478 16.2801 20.5709 15.3701C20.194 14.4602 20 13.4849 20 12.5C20 10.5109 20.7902 8.60322 22.1967 7.1967C23.6032 5.79018 25.5109 5 27.5 5C29.4891 5 31.3968 5.79018 32.8033 7.1967C34.2098 8.60322 35 10.5109 35 12.5ZM17.34 23.2C16.3394 22.8873 15.3088 22.6803 14.265 22.5825C13.6784 22.5253 13.0893 22.4978 12.5 22.5C2.5 22.5 0 30 0 32.5C0 34.1667 0.833333 35 2.5 35H13.04C12.6696 34.2195 12.4847 33.3638 12.5 32.5C12.5 29.975 13.4425 27.395 15.225 25.24C15.8325 24.505 16.54 23.8175 17.34 23.2ZM12.3 25C10.8213 27.2236 10.0221 29.8297 10 32.5H2.5C2.5 31.85 2.91 29.925 4.4 28.19C5.7625 26.6 8.13 25.05 12.3 25.0025V25ZM3.75 13.75C3.75 11.7609 4.54018 9.85322 5.9467 8.4467C7.35322 7.04018 9.26088 6.25 11.25 6.25C13.2391 6.25 15.1468 7.04018 16.5533 8.4467C17.9598 9.85322 18.75 11.7609 18.75 13.75C18.75 15.7391 17.9598 17.6468 16.5533 19.0533C15.1468 20.4598 13.2391 21.25 11.25 21.25C9.26088 21.25 7.35322 20.4598 5.9467 19.0533C4.54018 17.6468 3.75 15.7391 3.75 13.75ZM11.25 8.75C9.92392 8.75 8.65215 9.27678 7.71447 10.2145C6.77678 11.1521 6.25 12.4239 6.25 13.75C6.25 15.0761 6.77678 16.3479 7.71447 17.2855C8.65215 18.2232 9.92392 18.75 11.25 18.75C12.5761 18.75 13.8479 18.2232 14.7855 17.2855C15.7232 16.3479 16.25 15.0761 16.25 13.75C16.25 12.4239 15.7232 11.1521 14.7855 10.2145C13.8479 9.27678 12.5761 8.75 11.25 8.75Z"
                            fill="#542C7C" />
                    </svg>
                    <div class="flex-col justify-center items-center gap-1 flex">
                        <p class="text-center text-neutral-800 text-base font-medium ">Pendampingan
                            Mental</p>
                    </div>
                    <div
                        class="px-4 py-2 bg-purple-900 rounded-[100px] border border-purple-900 justify-center items-end gap-2.5 inline-flex">
                        <p class="text-white text-xs font-bold ">Info</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Artikel Mymental
                </h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Beberapa tulisan menarik tentang
                    kesahatan mental yang perlu Anda tahu</p>
            </div>
            <div class="flex-row justify-center items-center gap-10 flex">
                <div class="max-w-sm rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full"
                        src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">5 tips menjaga kesehatan mental</div>
                        <p class="text-gray-700 text-base">
                            Kesejahteraan tidak hanya tergantung pada kesehatan fisik,...
                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full"
                        src="https://images.unsplash.com/photo-1509475826633-fed577a2c71b?q=80&w=1471&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Memahami Perbedaan Antara Psikolog dan Psikiater</div>
                        <p class="text-gray-700 text-base">Psikolog dan psikiater, dua profesi dalam...
                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full"
                        src="https://images.unsplash.com/photo-1454942901704-3c44c11b2ad1?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Santai Kesehatan Mental</div>
                        <p class="text-gray-700 text-base">
                            Siapa bilang kesehatan cuma seputar badan? Kesehatan mental...
                        </p>
                    </div>
                </div>

                <div class="max-w-sm rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full"
                        src="https://images.unsplash.com/photo-1424878825877-7083ba5de185?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Melacak Jejak Sejarah Isu Kesehatan Mental</div>
                        <p class="text-gray-700 text-base">
                            Isu kesehatan mental telah menjalani perjalanan yang panjang...
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">

            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Galeri Mymental
                </h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Aktivitas mymental team untuk
                    menjaga kesehatan mental remaja indonesia</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-1.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-2.jpg" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-3.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-4.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-5.jpg" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-6.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-7.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-8.jpg" alt="">
                    </div>
                </div>
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-9.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-10.jpg" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/masonry/image-11.jpg" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Mmental teams
                    like yours</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Orang-orang keren yang peduli
                    dengan kesehatan mentalmu.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-4 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Teams Card -->
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto  justify-center items-start text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ 'img/photo/owner/div.review-author-avatar.png' }}" alt="danang Pradana"
                        class="flex w-[120px] mx-auto">
                    <h4 class="mb-4 text-2xl font-semibold">DANANG PRADANA (CAND) M.B.A</h4>
                    <div class="flex items-baseline justify-center my-2">
                        <span class="text-gray-500 dark:text-gray-400">CEO</span>
                    </div>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">5 years experience in Social
                        media specialist & digital marketing
                        COO Quran Review 2019
                        CMO PT Ruang Halal 2020.</p>

                </div>

                <!-- Teams Card -->
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto  justify-center items-start text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ 'img/photo/owner/div.review-author-avatar-1.png' }}" alt="danang Pradana"
                        class="flex w-[120px] mx-auto">
                    <h4 class="mb-4 text-2xl font-semibold">DR. HARIS ALWAFI M.B.A</h4>
                    <div class="flex items-baseline justify-center my-2">
                        <span class="text-gray-500 dark:text-gray-400">CTO</span>
                    </div>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">5 years experience in app
                        development & Medical doctor
                        Founder Kulinerku 2020</p>
                </div>

                <!-- Teams Card -->
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto  justify-center text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ 'img/photo/owner/div.review-author-avatar-2.png' }}" alt="danang Pradana"
                        class="flex w-[120px] mx-auto">
                    <h4 class="mb-4 text-2xl font-semibold">M. FAYYAZ SYAUQI</h4>
                    <div class="flex items-baseline justify-center my-2">
                        <span class="text-gray-500 dark:text-gray-400">CMO</span>
                    </div>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">3 years experience as
                        Product  designer Student at Indonesia art Institute  Yogyakarta</p>
                </div>

                <!-- Teams Card -->
                <div
                    class="flex flex-col max-w-lg p-6 mx-auto  justify-center text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <img src="{{ 'img/photo/owner/ownwr2.png' }}" alt="danang Pradana"
                        class="flex w-[120px] mx-auto">
                    <h4 class="mb-4 text-2xl font-semibold">YUNI LESTARI, M.PSI.,PSIKOLOG</h4>
                    <div class="flex items-baseline justify-center my-2">
                        <span class="text-gray-500 dark:text-gray-400">CPO</span>
                    </div>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">4 years experience in psychology consultation
                        Tim Psikolog HIMPSI DIY 
                        Associate Psychologist.</p>
                </div>

            </div>
        </div>
    </section>
    <!-- End block -->
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
            <div class="max-w-screen-sm mx-auto text-center">
                <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">
                    Start your free trial today</h2>
                <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Try Landwind Platform for 30
                    days. No credit card required.</p>
                <a href="#"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Free
                    trial for 30 days</a>
            </div>
        </div>
    </section>
    <!-- End block -->
    <footer class="bg-white dark:bg-gray-800">
        <div class="max-w-screen-xl p-4 py-6 mx-auto lg:py-16 md:p-8 lg:p-10">
            <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-5">
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Brand Center</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Discord Server</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Twitter</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Facebook
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Licensing</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Terms</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h3>
                    <ul class="text-gray-500 dark:text-gray-400">
                        <li class="mb-4">
                            <a href="#" class=" hover:underline">About</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Careers</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Brand Center</a>
                        </li>
                        <li class="mb-4">
                            <a href="#" class="hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>

            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="text-center">

                <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2021-2022 Landwind™. All
                    Rights Reserved. Built with <a href="https://flowbite.com"
                        class="text-purple-600 hover:underline dark:text-purple-500">Flowbite</a> and <a
                        href="https://tailwindcss.com"
                        class="text-purple-600 hover:underline dark:text-purple-500">Tailwind CSS</a>. Distributed by
                    <a href="https://themewagon.com/"
                        class="text-purple-600 hover:underline dark:text-purple-500">ThemeWagon</a>
                </span>
                <ul class="flex justify-center mt-5 space-x-5">
                    <li>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>
