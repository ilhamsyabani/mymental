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

    public function deletePost($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            session()->flash('status', 'Artikel berhasil dihapus.');
            $this->artikels = Post::all(); // Refresh data setelah penghapusan
        }
    }
}; ?>

<x-app-layout>
    @if (session('status'))
        <div id="alert-2"
            class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('status') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
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
                        <h4 class=" text-lg font-semibold">Tambahkan Audio </h4>
                        <a href="{{ route('audio-create') }}"
                            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                            Tambah Artikel</a>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Cover
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Judul
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Konten
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Penerbit
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($audios as $audio)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        <img src="https://images.unsplash.com/photo-1709114856846-afc89036ad96?q=80&w=1480&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Cover Image">
                                    </td>                                    
                                    <td class="px-6 py-4">
                                        {{ $audio->title }}
                                    </td>
                                    <td class="px-6 py-4" style="width: 10%;">
                                        <a href='{{$audio->content}}'>link content</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$audio->autor}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-4">
                                            <a x-on:click.prevent="editPost({{ $audio->id }})" href="#"
                                                class="text-blue-500 px-2 py-2 m-2 hover:underline">Edit</a>
                                            <a x-on:click.prevent="deletePost({{ $audio->id }})" href="#"
                                                class="text-red-500 px-2 py-2 m-2 hover:underline">Hapus</a>
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
