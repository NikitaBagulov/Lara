<!-- Посты пользователя -->
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
    @if ($com->approved == true)
    <li>
        <p>{{ $com->content }}</p>
    </li>
    @endif
    @endforeach
</ul>

@endif

<h2>Посты пользователя:</h2>
@if ($user->posts->isEmpty())
<ul>
    <p>У этого пользователя нет постов.</p>
</ul>
@else
<ul>
    @foreach ($user->posts as $post)
    <li>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        @if($post->is_published)
        <!-- Если пост опубликован -->
        <form method="POST" action="/users/{{$post->user_id}}/posts/{{$post->id}}/unpublish">
            @csrf
            <button type="submit">Снять с публикации</button>
        </form>
        @else
        <!-- Если пост не опубликован -->
        <form method="POST" action="/users/{{$post->user_id}}/posts/{{$post->id}}/publish">
            @csrf
            <button type="submit">Опубликовать</button>
        </form>
        @endif

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