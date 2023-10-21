<table>
    <tr>
        <th>ID</th>
        <th>Data</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        <td>{{ json_encode($item) }}</td>
    </tr>
    @endforeach
</table>
