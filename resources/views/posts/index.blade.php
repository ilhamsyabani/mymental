<?php

use App\Models\Post;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{

    /**
     * Handle an incoming registration request.
     */
    public function editPost($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

   public function deletePost($id){
        $post = Post::find($id);
   }

}; ?>

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
                        <a href="{{ route('posts.create') }}" class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                        Tambah Artikel</a>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Gambar
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Judul Artikel
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Konten
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artikels as $artikel)
                                
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <img src="{{$artikel->image}}" alt="" width="200px">
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$artikel->title}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Illuminate\Support\Str::limit($artikel->content, 100, '...') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-4">
                                            <a href="#" class="text-blue-500 px-2 py-2 m-2 hover:underline ">Edit</a>
                                            <a href="#" class="text-red-500 px-2 py-2 m-2 hover:underline ">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

