<?php

namespace App\Http\Controllers;

use Image;
use App\Models\User;
use App\Models\Post;
use App\Models\Topic;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topic_options = Topic::orderBy('name')->get();

        return view('post.create')->with([
            'topic_options' => $topic_options,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // todo get authenticated user
        // Auth::user();
        $authUser = User::first();

        $post = $authUser
            ->posts()
            ->create($request->except(['_token']));

        return redirect()
            ->route('post.show', $post)
            ->with('success', __('Post created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')
            ->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $topic_options = Topic::orderBy('name')->get();

        return view('post.edit')
            ->with(compact('post', 'topic_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->file('cover'))
        {
            $image = $request->file('cover');
            $fileID = uniqid();
            $filename = "/posts/{$fileID}.{$image->extension()}";

            Image::make($image)->save(public_path("/uploads{$filename}"));

            $post->cover = $filename;

            $post->save();
        }

        return redirect()
            ->route('post.edit', $post)
            ->with('success', __('Post updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
