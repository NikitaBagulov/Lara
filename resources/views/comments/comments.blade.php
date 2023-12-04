@extends('layout')

@section('content')
    <h1>Список всех комментариев</h1>

    @if ($comments->count() > 0)
        <ul>
            @foreach ($comments as $comment)
                <li>
                    <h3>{{ $comment->content }}</h3>
                    <p>
                        @if($comment->commentable_type === 'App\Post')
                            К посту: {{ $comment->commentable->title }}
                        @elseif($comment->commentable_type === 'App\User')
                            К пользователю: {{ $comment->commentable->name }} {{ $comment->commentable->lastname }}
                        @endif
                    </p>
                    @if ($comment->approved)
                    <form action="/comments/{{ $comment->id}}/reject" method="POST">
                        @csrf
                        <button type="submit">Не одобрять</button>
                    </form>
                    @else
                    <form action="/comments/{{$comment->id}}/approve" method="POST">
                        @csrf
                        <button type="submit">Одобрить</button>
                    </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Нет комментариев.</p>
    @endif
@endsection
