@extends('layout')

@section('content')
<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>City</th>
        <th>Age</th>

    </tr>
    @foreach($data as $id)
    <tr>
        @foreach($id as $forms => $item)
            <td>{{ $item }}</td>
        @endforeach
    </tr>
    @endforeach
</table>
@endsection
