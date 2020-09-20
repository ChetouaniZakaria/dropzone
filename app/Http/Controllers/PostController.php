<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $posts= Post::all();
        return view('posts.index', [ "posts" => $posts]  );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image;

        if($request->hasFile('file')){
            foreach( $request->file('file') as $img)
                {               
                    
                    $file = $img;
                    $name_with_extension = $file->getClientOriginalName();
                    $name = pathinfo($name_with_extension, PATHINFO_FILENAME);
                    $extension = $file->getClientOriginalExtension();
                    $image->path = $file->storeAs('post_images', $name . time() . '.'. $extension);
                    // return $file[0]->getClientOriginalName();
        
                };
            // $file = $request->file('file');
           
        };

        $post = new Post ;
        $post->title = $request->title;
        $post->user_id =1;
        $post -> save();
        // $post = Post::find(2);
    
        $post->images()->saveMany([$image]);
        // dd()

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
