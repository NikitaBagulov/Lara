@extends('layout')

@section('content')
<h1>Список постов</h1>

@if ($posts->count() > 0)
<ul>
    @foreach ($posts as $post)
    <li>

        <h3>{{ $post->title }}</h3>
        <h5>{{$post->user->name}} {{$post->user->lastname}}</h4>
            <p>{{ $post->content }}</p>
            <h4>Отзывы о посте:</h4>
            <a href="/users/0/posts/{{$post->id}}/create_com">Добавить отзыв</a>
            @if ($comment->isEmpty())
            <ul>
                <p>У этого поcта нет отзывов.</p>
                @else
                @foreach ($comment as $com)
                <li>
                    @if($com->commentable_id==$post->id)
                    <p>{{ $com->content }}</p>
                    @endif
                </li>
                @endforeach
            </ul>

            @endif

    </li>
    @endforeach
</ul>
@else
<p>Нет постов.</p>
@endif
@endsection