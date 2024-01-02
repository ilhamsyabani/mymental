<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Artikel') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <!-- component -->
        <div class="flex flex-col m-auto p-auto">
            <div class='mb-4'>
                <img class="w-full h-[200px] object-cover" src="{{ asset($article->image) }}" />
            </div>
            <div class="mb-4 p-8">
                <h3 class="text-2xl font-semibold text-gray-800 group-hover:text-gray-200">{{$article->title}}</h3>
                <div class="items-center mt-2">
                    <p class="text-sm text-gray-600">{!! $article->content !!}</p>
                </div>
            </div>
        </div>
        <style>
            .hide-scroll-bar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .hide-scroll-bar::-webkit-scrollbar {
                display: none;
            }

            .space-1 {
                gap: 4px;
            }

            .chips {
                display: flex;
                padding: 2px;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 4px;
                background: var(--Neutral-30, #EDEDED);
            }

            .chips-btn {
                display: flex;
                padding: 4px;
                justify-content: center;
                align-items: center;
                gap: 10px;
                border-radius: 4px;
                background: var(--Neutral-30, #EDEDED);
            }

            #time {
                height: 88px;
                width: 360px;
                border: none;
                overflow: hidden;
                background: none;
            }

            #time::-moz-focus-inner {
                border: 0;
            }

            #time:focus {
                outline: none;
            }

            #time option {
                padding: 4px 4px;
                text-align: center;
                margin-right: 4px;
                display: inline-block;
                cursor: pointer;
                border: #757575 solid 1px;
                border-radius: 5px;
                color: #A24A94;
            }
        </style>
    </div>
</x-app-layout>
