<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        // Proses penyimpanan artikel
        $post = new Post();
        $post->title = $data['title'];
        $post->image = $data['image'];
        $post->user_id = auth()->user()->id;
        $post->content = $data['content'];

        $post->save();

        return redirect()->route('posts-index')->with('status', 'New post add!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $pOST)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('livewire.pages.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);
    
        // Update the post with the new data
        $post->title = $data['title'];
        $post->image = $data['image'];
        $post->content = $data['content'];
    
        // Save the updated post to the database
        $post->save();
    
        // Redirect back to the post index page with a success message
        return redirect()->route('posts-index')->with('status', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
         if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts-index')->with('status', 'Post deleted successfully!');
    }
}
