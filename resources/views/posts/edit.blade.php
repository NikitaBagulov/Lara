@extends('layout')

@section('content')
    <h1>Редактировать пост</h1>

    <form method="post" action="/users/{{$post->user_id}}/posts/{{$post->id}}">
        
        @csrf
        

        <div>
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" value="{{ $post->title }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="content">Контент:</label>
            <textarea id="content" name="content">{{ $post->content }}</textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Обновить пост</button>
    </form>
@endsection
