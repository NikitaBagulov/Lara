@extends('layout')

@section('content')
<h1>Информация о пользователе</h1>
<p>Name: {{ $user->name }}</p>
<p>Lastname: {{ $user->lastname }}</p>
<p>Email: {{ $user->email }}</p>
<p>City: {{ $user->city }}</p>
<p>Age: {{ $user->age }}</p>
<a href="/users">Назад к списку</a>
<!-- Кнопка для создания поста -->
<a href="/users/{{$user->id}}/posts_create">Создать пост</a>

<h2>Отзывы о пользователе:</h2>
<a href="/users/{{$user->id}}/posts/0/create_com">Добавить отзыв</a>
@if ($comment->isEmpty())
<ul>
    <p>У этого пользователя нет отзывов.</p>
    @else
    @foreach ($comment as $com)
    <li>
        <p>{{ $com->content }}</p>
    </li>
    @endforeach
</ul>

@endif

<!-- Посты пользователя -->
<h2>Посты пользователя:</h2>
@if ($user->posts->isEmpty())
<ul>
    <p>У этого пользователя нет постов.</p>
    @else
    @foreach ($user->posts as $post)
    <li>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <a href="/users/{{$post->user_id}}/posts/{{$post->id}}/edit">Редактировать</a>
        <form method="POST" action="/users/{{$post->user_id}}/posts/{{$post->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
    </li>
    @endforeach
</ul>

@endif
@endsection