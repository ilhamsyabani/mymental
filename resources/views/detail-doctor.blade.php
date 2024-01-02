<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dokter') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <!-- component -->
        <div class="flex flex-col m-auto p-auto">
            <div class="mb-4 p-4">
                <div class='mb-4'>
                    <img class="w-full h-[200px] object-cover object-top" src="{{ asset($doctor->photo) }}" />
                </div>
                <div class="px-4 mb-4 rounded-md">
                    <h4 class="text-xl font-semibold text-gray-800 pl-2 group-hover:text-gray-200">{{$doctor->name}}</h4>
                    <div class="flex space-1 items-center pl-2">
                        <p class="text-sm text-gray-600">{{$doctor->spesialis}} | </p>
                        <span class="chips text-xs">{{$doctor->pendidikan}}</span>
                    </div>
                    <div class="space-1 ml-2 pt-2 flex">
                        <span class="chips text-xs">Anxiety</span>
                        <span class="chips text-xs">Stress</span>
                        <span class="chips text-xs">Depresi</span>
                    </div>
                </div>
                <div class="px-4 rounded-md">
                    <h4 class="text-xl font-semibold text-gray-800 pl-2 group-hover:text-gray-200">Biografi</h4>
                    <div class="flex space-1 items-center pl-2">
                        <p class="text-sm text-gray-600">{{$doctor->deskripsi}} </p>
                    </div>
                    <div class="space-1 ml-2 pt-2 flex ">
                        <div class="border-gray-400 border-2 border-opacity-60 bg-slate-50 p-4 rounded-md">
                            <div class="flex space-1 text-center justify-center items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="12" fill="#E47810" />
                                    <g clip-path="url(#clip0_72_471)">
                                        <path
                                            d="M16.6667 8.49996H14.3334V7.33329C14.3334 6.68579 13.8142 6.16663 13.1667 6.16663H10.8334C10.1859 6.16663 9.66675 6.68579 9.66675 7.33329V8.49996H7.33341C6.68591 8.49996 6.17258 9.01913 6.17258 9.66663L6.16675 16.0833C6.16675 16.7308 6.68591 17.25 7.33341 17.25H16.6667C17.3142 17.25 17.8334 16.7308 17.8334 16.0833V9.66663C17.8334 9.01913 17.3142 8.49996 16.6667 8.49996ZM13.1667 8.49996H10.8334V7.33329H13.1667V8.49996Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_72_471">
                                            <rect width="14" height="14" fill="white"
                                                transform="translate(5 5)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="text-sm font-semibold">{{$doctor->pengalaman}} tahun</span>
                            </div>
                            <p class="text-sm mt-2 text-center ">Pengalaman</p>
                        </div>
                        <div class="border-gray-400 border-2 border-opacity-60 bg-slate-50 p-4 rounded-md">
                            <div class="flex space-1 text-center justify-center items-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect width="20" height="20" rx="10" fill="#E47810" />
                                    <g clip-path="url(#clip0_84_464)">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.5 12.5L10 11.03C9.805 11.01 9.66 11 9.5 11C8.165 11 5.5 11.67 5.5 13V14H10L8.5 12.5ZM9.5 10C10.605 10 11.5 9.105 11.5 8C11.5 6.895 10.605 6 9.5 6C8.395 6 7.5 6.895 7.5 8C7.5 9.105 8.395 10 9.5 10Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.735 14.25L10 12.5L10.7 11.795L11.735 12.835L14.3 10.25L15 10.955L11.735 14.25Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_84_464">
                                            <rect width="12" height="12" fill="white"
                                                transform="translate(4 4)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span class="text-sm font-semibold">87</span>
                            </div>
                            <p class="text-sm mt-2 text-center ">Pelangan</p>
                        </div>
                        <div class="border-gray-400 border-2 border-opacity-60 bg-slate-50 p-4 rounded-md">
                            <div class="flex space-1 text-center justify-center items-center">
                                <span class="text-sm font-semibold">{{$doctor->SIPP}}</span>
                            </div>
                            <p class="text-sm mt-2 text-center ">SIPP</p>
                        </div>
                    </div>
                    <div class="flex-col m-auto p-auto mt-4">
                        <div class="w-[340px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
                    </div>
                    <form action="/checkout" method="POST">
                        @csrf
                        <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                        <input type="hidden" name="price" value="60000">
                        <h4 class="text-xl font-semibold text-gray-800 pl-2 mt-4 mb-2 group-hover:text-gray-200">Pilih
                            tanggal
                            konseling</h4>

                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-orientation="bottom" name="date_book" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>

                        <div class="flex-col m-auto p-auto mt-4">
                            <div class="w-[340px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
                        </div>
                        <div class="">
                            <h4 class="text-xl font-semibold text-gray-800 pl-2 mt-4 group-hover:text-gray-200">Pilih
                               Waktu
                                konseling</h4>
                            <select name="time_book" id="time" multiple>
                                <div class="pt-2 flex">
                                    <option value="07:00">07:00</option>
                                    <option value="08:00">08:00</option>     
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                </div>
                            </select>
                        </div>
                        
                        <div class="flex-col m-auto p-auto mt-4">
                            <div class="w-[340px] h-[0px] border-t my-auto border-neutral-200 m-auto"></div>
                        </div>
                        <div class="items-center mt-8">
                            <x-primary-button class="">
                                {{ __('Proses Pesanan') }}
                            </x-primary-button>
                        </div>
                    </form>
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
