<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storages;
// use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // közvetlen SQL lekérdezéssel is lehet:
        // $posts = DB::select('SELECT * FROM posts ORDER BY id DESC');
        // $posts = Post::orderBy('id', 'desc')->get();
        // $posts = Post::orderBy('id', 'desc')->take(1)->get();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle file upload
        if($request->hasFile('cover_image')) {
            // Get the filename with the extension
            $fileNameWithExt = $request->file('cover-image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extName = $request->file('cover-image')->guessClientExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extName;
            // Upload image
            $path = $request->file('cover-image')->storeAs('/storage/cover_images', $fileNameToStore);
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('cover_image') {
            $post->cover_image = $fileNameToStore
        }
        $post-> save();

        return redirect('/post')->with('success', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($request->hasFile('cover_image')) {
            // Get the filename with the extension
            $fileNameWithExt = $request->file('cover-image')->getClientOriginalName();
            // Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extName = $request->file('cover-image')->guessClientExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extName;
            // Upload image
            $path = $request->file('cover-image')->storeAs('/storage/cover_images', $fileNameToStore);
        }


        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image') {
            $post->cover_image = $fileNameToStore
        }
        $post-> save();

        return redirect('/post')->with('success', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($post->cover_image != 'noimage.jpg') {
            // Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post = Post::find($id);
        $post->delete();
        return redirect('/dashboard')->with('success', 'Post successfully deleted');
    }
}
