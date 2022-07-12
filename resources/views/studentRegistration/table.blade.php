<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($studentRegistrations as $studentRegistration)
        <tr>
            <td>{{ $studentRegistration->nameWithInitial }}</td>
            <td>{{ $studentRegistration->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
