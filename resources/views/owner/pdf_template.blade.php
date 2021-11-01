<table>
    <tr>
        <th> ID </th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    @foreach ($owners as $owner)
    <tr>
        <td>{{ $owner->id }}</td>
        <td>{{ $owner->name }}</td>
        <td>{{ $owner->surname }}</td>
        <td>{{ $owner->email }}</td>
        <td>{{ $owner->phone }}</td>
    </tr>
    @endforeach
</table>
