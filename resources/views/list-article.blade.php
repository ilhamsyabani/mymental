<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Artikel') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <!-- component -->
        <div class="flex flex-col m-auto p-auto">
            <div class="mb-4 p-4">
                <div class='max-w-md mx-auto'>
                    <div
                        class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                        <div class="grid place-items-center h-full w-12 text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text"
                            id="search" placeholder="Search something.." />
                    </div>
                </div>
            </div>
            @foreach ($articles as $article)
                <div class="flex overflow-x-scroll pb-4 hide-scroll-bar">
                    <div class="flex flex-nowrap lg:ml-0 md:ml-4 ml-4 ">

                        <div class="inline-block px-3">
                            <a href="{{ route('article.show', $article->id) }}" class="mt-4">
                                <div
                                    class="relative flex w-full max-w-[48rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                                    <div
                                        class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
                                        <img src="{{ asset($article->image) }}" alt="image"
                                            class="h-full w-full object-cover" />
                                    </div>
                                    <div class="p-4">
                                        <h4
                                            class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                                            {{ $article->title }}
                                        </h4>
                                        <p
                                            class="mb-8 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                                            
                                        </p>
                                        <div>
                                            <div
                                                class="mt-6 flex items-center justify-between text-sm font-semibold text-gray-900">
                                                <div class="flex items-center">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.2" cx="12" cy="12" r="12"
                                                            fill="#30D058" />
                                                        <path
                                                            d="M11.994 6C8.682 6 6 8.688 6 12C6 15.312 8.682 18 11.994 18C15.312 18 18 15.312 18 12C18 8.688 15.312 6 11.994 6ZM14.4 14.4C14.3445 14.4556 14.2786 14.4998 14.206 14.5299C14.1334 14.56 14.0556 14.5755 13.977 14.5755C13.8984 14.5755 13.8206 14.56 13.748 14.5299C13.6754 14.4998 13.6095 14.4556 13.554 14.4L11.58 12.426C11.5233 12.3704 11.4782 12.3042 11.4473 12.231C11.4164 12.1579 11.4003 12.0794 11.4 12V9.6C11.4 9.27 11.67 9 12 9C12.33 9 12.6 9.27 12.6 9.6V11.754L14.4 13.554C14.634 13.788 14.634 14.166 14.4 14.4Z"
                                                            fill="#30D058" />
                                                    </svg>
                                                    <span class="flex text-sm">7 Minutes</span>
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
