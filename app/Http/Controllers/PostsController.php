<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

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

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|min:5|max:100',
            'content' => 'required|min:10'
        ]);

        $post = new BlogPost();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function show($id)
    {
        //abort_if(!isset($this->posts[$id]), 404);

        return view('posts.show', ['post' => BlogPost::FindOrFail($id)]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
