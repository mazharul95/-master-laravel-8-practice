<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;

class PostsController extends Controller
{

    public function index()
    {
        return view('posts.index', ['posts' => BlogPost::all()]);
        //query builder
        //return view('posts.index', ['posts' => BlogPost::orderBy('created_at', 'desc')->take(5)->get()]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $post = BlogPost::create($validated);

        $request->session()->flash('status', 'the blog post was created');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function show($id)
    {
        //abort_if(!isset($this->posts[$id]), 404);

        return view('posts.show', ['post' => BlogPost::FindOrFail($id)]);
    }

    public function edit($id)
    {
        return view('posts.edit', ['post' => BlogPost::findOrfail($id)]);
    }

    public function update(StorePost $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'the blog post was Updated!');

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        session()->flash('status', 'the blog post was deleted! ');

        return redirect()->route('posts.index');
    }
}
