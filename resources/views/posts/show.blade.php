@extends('layouts.app')

@section('title', $post['title'])

@section('content')
    @if ($post['is_new'])
        <div>A new Blog Post! Using if</div>
    @elseif (!$post['is_new'])
        <div>blog post is old! using elseif</div>
    @endif
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
@endsection
