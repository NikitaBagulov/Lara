@extends('layout')

@section('content')
    <h1>Список пользователей</h1>
    <a href="/users/add">Создать нового пользователя</a>

    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>City</th>
                <th>Age</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->age }}</td>
                    <td>@foreach($user->role as $r){{$r->name}}@endforeach</td>
                    <td>
                        <a href="/users/{{$user->id}}">Показать</a>
                        <a href="/users/{{$user->id}}/edit">Редактировать</a>
                        <form method="POST" action="/users/{{$user->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
