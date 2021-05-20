@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- @dd($post->user->name); --}} 
                <h1>{{ $post->title }}</h1>
                <p>{{ $post->content }}</p>
                <p>Autore del post: <strong>{{ $post->user->name }}</strong></p> {{-- vede il nome dell'utente che ha scritto il post --}}
            </div>
        </div>
    </div>
@endsection