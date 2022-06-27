@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <h1>Hello World!</h1>

    <div>
        @for ($i = 0; $i < 10; $i++)
            <div>the current value is {{ $i }}</div>
        @endfor
    </div>

    <div>
        @php $done = false @endphp
        @while (!$done)
            <div>Im not done</div>
            @php
                if (random_int(0, 1) === 1) {
                    $done = true;
                }
            @endphp
        @endwhile
    </div>
@endsection
