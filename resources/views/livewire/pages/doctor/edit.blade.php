<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <div class="max-w-full flex justify-between items-center mt-4 mb-8">
                        <h4 class=" text-lg font-semibold">Daftar Artikel </h4>

                    </div>
                    <div>
                        <form action="{{ route('doctor-update', $doctor) }}" method="POST" enctype="multipart/form-data"
                            class="mt-12">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Nama</label>
                                <input wire:model="name" id="name" type="text" name="name" value="{{ $doctor->name }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="block mb-2 text-sm font-medium text-gray-900">
                                    Photo</label>
                                <input wire:model="photo" id="photo" type="text" name="photo"  value="{{ $doctor->photo }}" 
                                class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('photo')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="cover" class="block mb-2 text-sm font-medium text-gray-900">Cover</label>
                                <input wire:model="cover" id="cover" type="text" name="cover"  value="{{ $doctor->cover }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('cover')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="spesialis"
                                    class="block mb-2 text-sm font-medium text-gray-900">Spesialis</label>
                                <select wire:model="spesialis" id="spesialis" name="spesialis"
                                class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                    @if( $doctor->spesialis )
                                    <option value="{{ $doctor->spesialis }}" selected>{{ $doctor->spesialis }}</option>
                                    @endif
                                    <option value="Anak">Anak</option>
                                    <option value="Klinis">Kelinis</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Lainya">Lainnya</option>
                                </select>
                                @error('spesialis')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                <textarea wire:model="deskripsi" id="deskripsi" name="deskripsi" value="{{ $doctor->deskripsi }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">{{ $doctor->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="pendidikan"
                                    class="block mb-2 text-sm font-medium text-gray-900">pendidikan</label>
                                <input wire:model="pendidikan" id="pendidikan" type="text" name="pendidikan" value="{{ $doctor->pendidikan }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('pendidikan')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="pengalaman"
                                    class="block mb-2 text-sm font-medium text-gray-900">Pengalaman</label>
                                <input wire:model="pengalaman" id="pengalaman" type="text" name="pengalaman" value="{{ $doctor->pengalaman }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('pengalaman')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="SIPP" class="block mb-2 text-sm font-medium text-gray-900">SIPP</label>
                                <input wire:model="SIPP" id="SIPP" type="text" name="SIPP" value="{{ $doctor->SIPP }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('SIPP')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                                <input wire:model="harga" id="harga" type="text" name="harga" value="{{ $doctor->harga }}" 
                                    class="w-full px-4 py-3 rounded-lg bg-gray-200 mt-2 border focus:border-blue-500 focus:bg-white focus:outline-none">
                                @error('harga')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit"
                                class="block bg-indigo-500 hover:bg-indigo-400 focus:bg-indigo-400 text-white font-semibold rounded-lg px-4 py-3 mt-6">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>