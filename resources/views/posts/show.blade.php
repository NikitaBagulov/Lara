@extends('layout')

@section('content')
    <h1>Просмотр поста</h1>

    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <!-- Другие детали поста, если есть -->
    </div>

    <a href="/">Все посты</a> 
@endsection