<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <livewire:layout.navigation />

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div> --}}
        <!-- component -->
        <div class="flex flex-col m-auto p-auto">
            <div class="mb-4">
                <div class="flex row-auto justify-between lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4">
                    <h4 class="flex font-bold text-xl ">
                        Rekomendasi Artikel
                    </h4>
                    <a href="{{ route('articles') }}" class=" text-blue-600">Lihat Semua</a>
                </div>
                <p class="flex lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4 ">Artikel piihan kami yang sesuia
                    kebutuhan kamu</p>
            </div>
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                <div class="flex flex-nowrap lg:ml-0 md:ml-4 ml-4 ">
                    @foreach ($posts as $post)
                        <a href="{{ route('article.show', $post->id) }}" class="mt-4">
                            <div
                                class="w-40 h-[160px] p-[8px] mx-[8px] bg-white rounded-lg shadow flex-col justify-start items-start gap-[5.82px] inline-flex">
                                <div class="flex-col justify-start items-start gap-[5.82px] flex">
                                    <img class="w-[160px] h-[100px] rounded-md" src="{{ asset($post->image) }}" />
                                    <div class="justify-start items-center gap-[11.64px] inline-flex">
                                        <div class="flex-col justify-start items-start inline-flex">
                                            <div
                                                class="text-black text-opacity-60 text-[10.18px] font-semibold leading-none">
                                                {{ $post->title }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="flex flex-col m-auto p-auto">
            <div class="mb-4">
                <div class="flex row-auto justify-between lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4">
                    <h4 class="flex font-bold text-xl ">
                        Rekomendasi Video
                    </h4>
                    <a href="" class=" text-blue-600">Lihat Semua</a>
                </div>
                <p class="flex lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4 ">Artikel piihan kami yang sesuia
                    kebutuhan kamu</p>
            </div>
            <div class="flex overflow-x-scroll hide-scroll-bar">
                <div class="flex flex-nowrap lg:ml-0 md:ml-4 ml-4 ">
                    <div class="order-first block w-full  aspect-square lg:mt-0">
                        <img class="object-cover rounded-3xl object-center w-full mx-auto bg-gray-300 lg:ml-auto "
                            alt="hero"
                            src="https://i.pinimg.com/originals/2e/2b/21/2e2b21aeed393403d4620367f9e093f9.gif" />
                        <div class="flex row-auto justify-between py-2 px-4">
                            <div>
                                <h5 class="flex font-bold ">
                                    Rekomendasi Video
                                </h5>
                            </div>
                            <div class="">
                                <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.4173 1.08783C14.4713 -0.570554 11.5771 -0.272259 9.79092 1.57078L9.09134 2.29166L8.39177 1.57078C6.6091 -0.272259 3.71137 -0.570554 1.76535 1.08783C-0.464763 2.99124 -0.581951 6.40743 1.41379 8.47064L8.28524 15.5658C8.72913 16.0239 9.45001 16.0239 9.8939 15.5658L16.7654 8.47064C18.7646 6.40743 18.6475 2.99124 16.4173 1.08783Z"
                                        fill="#BEBBBB" fill-opacity="0.6" />
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="flex flex-col m-auto p-auto">
            <div class="mb-4">
                <div class="flex row-auto justify-between lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4">
                    <h4 class="flex font-bold text-xl ">
                        Rekomendasi Audio
                    </h4>
                    <a href="" class=" text-blue-600">Lihat Semua</a>
                </div>
                <p class="flex lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4 ">Audio piihan kami yang sesuia
                    kebutuhan kamu</p>
            </div>
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
                <div class="flex flex-nowrap lg:ml-0 md:ml-4 ml-4 ">
                    @foreach ($audios as $audio)
                        <a href="{{ $audio->content }}">
                            <div
                                class="w-[100px] h-[120px] p-[8px] mx-2 border-2 rounded-lg flex-col justify-center items-center gap-[8px] inline-flex">
                                <div class="flex-col justify-start items-center flex">
                                    <img class="w-[59.64px] h-[59.64px] rounded-full"
                                        src="{{ asset($audio->cover) }}" />
                                    <div class="text-stone-900 text-xs text-center font-bold">{{ $audio->title }}</div>
                                </div>

                                {{-- <div class="w-[85.20px] h-[25.56px] relative">
                                    <p class=" text-center font-light text-xs"> <span class=" font-semibold">
                                            {{ $audio->autor }} </span></p>
                                </div> --}}
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="flex flex-col m-auto p-auto">
            <div class="mb-4">
                <div class="flex row-auto justify-between lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4">
                    <h4 class="flex font-bold text-xl ">
                        Rekomendasi Dokter
                    </h4>
                    <a href="{{ route('doctors') }}" class=" text-blue-600">Lihat Semua</a>
                </div>
                <p class="flex lg:px-20 md:px-4 px-2 lg:mx-40 md:mx-12 mx-4 ">Dokter piihan kami yang sesuia
                    kebutuhan kamu</p>
            </div>
            @foreach ($doctors as $doctor)
                <div class="flex overflow-x-scroll pb-4 hide-scroll-bar">
                    <div class="flex flex-nowrap lg:ml-0 md:ml-4 ml-4 ">

                        <div class="inline-block px-3">
                            <a href="{{ route('doctor.show', $doctor->id) }}" class="mt-4">
                                <div
                                    class="relative flex w-full max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                                    <div
                                        class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                                        <img src="{{ asset($doctor->photo) }}" alt="image"
                                            class="h-full w-full object-cover" />
                                    </div>
                                    <div class="p-4">
                                        <h6
                                            class="block font-sans text-xs font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                                            {{ $doctor->spesialis }}
                                        </h6>
                                        <h4
                                            class="block font-sans  text-sm font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                            {{ $doctor->name }}
                                        </h4>
                                        <p
                                            class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                                            {{ $doctor->SIPP }}
                                        </p>
                                        <div>
                                            <div
                                                class="mt-6 flex items-center justify-between text-sm font-semibold text-gray-900">
                                                <div class="flex items-center">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.2" cx="12" cy="12" r="12"
                                                            fill="#F89D3D" />
                                                        <path
                                                            d="M16.6445 9.87341L13.3469 9.37156L11.8728 6.24209C11.8325 6.15641 11.7663 6.08705 11.6845 6.04489C11.4792 5.9388 11.2299 6.02721 11.1273 6.24209L9.65317 9.37156L6.35558 9.87341C6.26467 9.88701 6.18155 9.93189 6.11791 9.9999C6.04097 10.0827 5.99858 10.1941 6.00004 10.3096C6.0015 10.4252 6.0467 10.5354 6.1257 10.616L8.51155 13.0518L7.94788 16.4914C7.93466 16.5714 7.94312 16.6537 7.97229 16.7289C8.00146 16.8042 8.05017 16.8693 8.11291 16.9171C8.17565 16.9648 8.24991 16.9931 8.32725 16.9989C8.4046 17.0047 8.48194 16.9876 8.55051 16.9497L11.5 15.3258L14.4495 16.9497C14.5301 16.9946 14.6236 17.0096 14.7132 16.9932C14.9392 16.9524 15.0911 16.728 15.0522 16.4914L14.4885 13.0518L16.8744 10.616C16.9393 10.5494 16.9821 10.4623 16.9951 10.3671C17.0302 10.1291 16.8718 9.90877 16.6445 9.87341Z"
                                                            fill="#F89D3D" />
                                                    </svg>
                                                    <span class="mr-1 text-xs pl-2">4.8</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.2" cx="12" cy="12" r="12"
                                                            fill="#30D058" />
                                                        <path
                                                            d="M11.994 6C8.682 6 6 8.688 6 12C6 15.312 8.682 18 11.994 18C15.312 18 18 15.312 18 12C18 8.688 15.312 6 11.994 6ZM14.4 14.4C14.3445 14.4556 14.2786 14.4998 14.206 14.5299C14.1334 14.56 14.0556 14.5755 13.977 14.5755C13.8984 14.5755 13.8206 14.56 13.748 14.5299C13.6754 14.4998 13.6095 14.4556 13.554 14.4L11.58 12.426C11.5233 12.3704 11.4782 12.3042 11.4473 12.231C11.4164 12.1579 11.4003 12.0794 11.4 12V9.6C11.4 9.27 11.67 9 12 9C12.33 9 12.6 9.27 12.6 9.6V11.754L14.4 13.554C14.634 13.788 14.634 14.166 14.4 14.4Z"
                                                            fill="#30D058" />
                                                    </svg>
                                                    <span class="flex text-xs">01:00 - 08:00 PM</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach

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
