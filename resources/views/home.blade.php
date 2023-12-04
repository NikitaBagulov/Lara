@extends('layout')

@section('content')
<h1>Список опубликованных постов</h1>

@if ($posts->where('is_published', true)->count() > 0)
<ul>
    @foreach ($posts->where('is_published', true) as $post)
    <li>
        <h3>{{ $post->title }}</h3>
        <h5>{{ $post->user->name }} {{ $post->user->lastname }}</h5>
        <p>{{ $post->content }}</p>
        <h4>Отзывы о посте:</h4>
        <a href="/users/0/posts/{{ $post->id }}/create_com">Добавить отзыв</a>
        @if ($comment->isEmpty())
        <ul>
            <p>У этого поста нет отзывов.</p>
        </ul>
        @else
        <ul>
            @foreach ($comment as $com)
            @if ($com->approved == true)
            @if ($com->commentable_id == $post->id)
            <li>
                <p>{{ $com->content }}</p>
            </li>
            @endif
            @endif
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>
@else
<p>Нет опубликованных постов.</p>
@endif
@endsection