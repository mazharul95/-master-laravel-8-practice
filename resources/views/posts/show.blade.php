@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>
        {{ $post->title }}
        @badge(['show' => now()->diffInMinutes($post->created_at) < 240])
            Brand New Post!
        @endbadge
    </h1>

    <p>{{ $post->content }}</p>
    @updated(['date' => $post->created_at, 'name' => $post->user->name])
    @endupdated

    @updated(['date' => $post->created_at])
        Updated
    @endupdated

    <h4>Comments</h4>

    @forelse ($post->comments as $comment)
        <p>
            {{ $comment->content }},
        </p>

        @updated(['date' => $comment->created_at])
        @endupdated
    @empty
        <P>No comments yet!</P>
    @endforelse
@endsection
