<form action="{{ route('form.submit') }}" method="post">
    @csrf
    <input type="text" name="data" value="{{ old('data') }}" required>
    <button type="submit">Отправить</button>
</form>
