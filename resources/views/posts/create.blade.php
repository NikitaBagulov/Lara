<!-- posts/create.blade.php -->

@extends('layout')

@section('content')
    <h1>Создать пост для пользователя {{ $user->name }}</h1>

    <form method="post" action="/users/{{$user->id}}/posts">
        @csrf

        <div>
            <label for="title">Заголовок:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="content">Контент:</label>
            <textarea id="content" name="content">{{ old('content') }}</textarea>
            @error('content')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Создать пост</button>
    </form>
@endsection
