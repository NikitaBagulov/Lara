@extends('layout')

@section('content')
<h1>Добавить отзыв</h1>

<form method="post" action="/users/{{$userId}}/posts/{{$postId}}/create_com">
    @csrf
    <div>
        <h1>ОТЗЫВ</h1>
        <textarea id="content" name="content">{{ old('content') }}</textarea>
        @error('content')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Отозваться</button>
</form>

@endsection