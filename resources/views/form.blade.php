@extends('layout')

@section('title', "Form")



@section('content')

@if (session('message'))
<div style="color: green;">
            {{session('message')}}
</div>
@endif

<form method="post" action="/form">
    @csrf

<div>
      <label>Name</label>
      <input type="text" name="name" value="{{ old('name') }}">
      @error('name')
      <div style="color: red;">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>LastName</label>
      <input type="text" name="lastname" value="{{ old('lastname') }}">
      @error('lastname')
      <div style="color: red;">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>Age</label>
      <input type="text" name="age" value="{{ old('age') }}">
      @error('age')
      <div style="color: red;">{{$message}}</div>
      @enderror
</div>
<br>
<div>
      <label>City</label>
      <select name="city">
        <option value="Irkutsk">Irkutsk</option>
        <option value="Angarsk">Angarsk</option>
        <option value="Bratsk">Bratsk</option>
    </select>
    @error('city')
      <div style="color: red;">{{$message}}</div>
      @enderror

</div>
<br>
<div>
      <label>Email</label>
      <input type="text" name="email" value="{{ old('email') }}">
      @error('email')
      <div style="color: red;">{{$message}}</div>
      @enderror
</div>
<br>
      <button type="submit" name="button">Отправить</button>
</form>

@endsection
