@extends('layout')

@section('title', "Form")

@section('content')

@if (session('message'))
<div style="color: green;">
    {{ session('message') }}
</div>
@endif

<form method="POST" action="/users/{{ $user->id }}"> <!-- Изменение URL и метода на редактирование -->
    @csrf <!-- Используем метод PUT для редактирования -->

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}"> <!-- Значение поля из базы данных -->
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>LastName</label>
        <input type="text" name="lastname" value="{{ $user->lastname }}"> <!-- Значение поля из базы данных -->
        @error('lastname')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Age</label>
        <input type="text" name="age" value="{{ $user->age }}"> <!-- Значение поля из базы данных -->
        @error('age')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>City</label>
        <select name="city">
            <option value="Irkutsk" @if($user->city === 'Irkutsk') selected @endif>Irkutsk</option>
            <!-- Выбор города из базы данных -->
            <option value="Angarsk" @if($user->city === 'Angarsk') selected @endif>Angarsk</option>
            <option value="Bratsk" @if($user->city === 'Bratsk') selected @endif>Bratsk</option>
        </select>
        @error('city')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Email</label>
        <input type="text" name="email" value="{{ $user->email }}"> <!-- Значение поля из базы данных -->
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div>
        <label>Role</label>
            @foreach ($roles as $role)
            <input type='checkbox' name='roles[]' value="{{ $role->id }}" @if ($user->role_id === $role->id) checked @endif>{{ $role->name }}
            @endforeach
    </div>
    <br>
    <button type="submit" name="button">Обновить</button> <!-- Изменить текст кнопки на "Обновить" -->
</form>

@endsection