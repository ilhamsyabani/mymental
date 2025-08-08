<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profil Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8 space-y-8 lg:space-y-0">

                <div class="lg:col-span-2 bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <div class="p-6 md:p-8">
                        <div class="relative">
                            <img class="w-full h-48 object-cover rounded-lg" src="{{ asset('storage/'. $doctor->photo) }}" alt="Banner {{ $doctor->name }}">
                            <img class="w-32 h-32 object-cover rounded-full absolute -bottom-16 left-8 border-4 border-white dark:border-gray-800 shadow-lg" src="{{ asset('storage/'. $doctor->photo) }}" alt="Foto {{ $doctor->name }}">
                        </div>

                        <div class="mt-20">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{$doctor->name}}</h1>
                            <p class="text-indigo-500 dark:text-indigo-400 font-semibold">{{$doctor->spesialis}}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{$doctor->pendidikan}}</p>
                        </div>

                        <div class="mt-4 flex flex-wrap gap-2">
                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-medium px-2.5 py-1 rounded-full">Kecemasan</span>
                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-medium px-2.5 py-1 rounded-full">Stres</span>
                            <span class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-xs font-medium px-2.5 py-1 rounded-full">Depresi</span>
                        </div>

                        <hr class="my-8 dark:border-gray-700">

                        <div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Biografi</h2>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{$doctor->deskripsi}}</p>
                        </div>
                        
                        <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-6 text-center">
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                                <p class="text-2xl font-bold text-indigo-500">{{$doctor->pengalaman}}+</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Tahun Pengalaman</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg">
                                <p class="text-2xl font-bold text-indigo-500">87</p> {{-- Ganti dengan data dinamis jika ada --}}
                                <p class="text-sm text-gray-500 dark:text-gray-400">Klien Puas</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-700/50 p-4 rounded-lg col-span-2 sm:col-span-1">
                                <p class="text-lg font-bold text-indigo-500">{{$doctor->SIPP}}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Nomor SIPP</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 md:p-8 sticky top-24">
                        <form action="/checkout" method="POST">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                            <input type="hidden" name="price" value="{{ $doctor->harga }}">
                            
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Jadwalkan Konsultasi</h3>
                                <p class="mt-1 text-2xl font-light text-gray-900 dark:text-white">
                                    <span class="font-bold">Rp {{ number_format($doctor->harga, 0, ',', '.') }}</span>
                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">/ sesi</span>
                                </p>
                            </div>

                            <hr class="my-6 dark:border-gray-700">

                            <div>
                                <label for="appointment_at" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Tanggal</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-orientation="bottom" name="appointment_at" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Pilih tanggal" required>
                                </div>
                            </div>
                            
                            <div 
                                x-data="{
                                    selectedTime: '',
                                    timeSlots: ['07:00', '08:00', '09:00', '10:00', '13:00', '14:00', '15:00', '16:00']
                                }" 
                                class="mt-6"
                            >
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Waktu</label>
                                <input type="hidden" name="appointment_time" x-model="selectedTime">
                                <div class="grid grid-cols-4 gap-2">
                                    <template x-for="slot in timeSlots" :key="slot">
                                        <button 
                                            type="button"
                                            @click="selectedTime = slot"
                                            :class="{
                                                'bg-indigo-600 text-white border-indigo-600': selectedTime === slot,
                                                'bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-200 border-gray-300 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700': selectedTime !== slot
                                            }"
                                            class="w-full text-sm font-semibold py-2 border rounded-lg transition-colors duration-200"
                                            x-text="slot"
                                        ></button>
                                    </template>
                                </div>
                                <p x-show="!selectedTime" class="text-xs text-red-500 mt-2">Silakan pilih salah satu jam.</p>
                            </div>

                            <div class="mt-8">
                                <x-primary-button class="w-full justify-center py-3 text-base">
                                    {{ __('Proses Pesanan') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>