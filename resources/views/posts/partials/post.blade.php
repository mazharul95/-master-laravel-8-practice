<p>
<h3>
    <a class="text-muted" href="{{ route('posts.show', ['post' => $post->id]) }}"> {{ $post->title }} </a>
</h3>

<p class="text-muted">
    Added {{ $post->created_at->diffForHumans() }}
    by {{ $post->user->name }}
</p>

@if ($post->comments_count)
    <p>{{ $post->comments_count }} comments</p>
@else
    <p>No comments yet!</p>
@endif

@auth
    @can('update', $post)
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
    @endcan
@endauth

{{-- @cannot('delete', $post)
        <p>You can't delete this post</p>
    @endcannot --}}

@auth
    @if (!$post->trashed())
        @can('delete', $post)
            <form method="POST" class="fm-inline" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
                @csrf
                @method('DELETE')

                <input type="submit" value="{{ __('Delete!') }}" class="btn btn-primary" />
            </form>
        @endcan
    @endif
@endauth

</p>
