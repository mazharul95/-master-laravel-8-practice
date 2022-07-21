@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')
    <h1>Contact Page - 2022</h1>
    <p>Hello this is contact details</p>

    @can('home.secret')
        <p>
            <a href="{{ route('secret') }}">
                Go to special contact details!
            </a>
        </p>
    @endcan
@endsection
