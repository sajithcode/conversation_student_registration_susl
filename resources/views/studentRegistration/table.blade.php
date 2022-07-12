<table>
    <thead>
    <tr>
        <th>Registration Number</th>
        <th>Index Number</th>
        <th>Name With Initial</th>
        <th>Full Name In English Block Letter</th>
        <th>Full Name In Sinhala</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($studentRegistrations as $studentRegistration)
        <tr>
            <td>{{ $studentRegistration->regNum }}</td>
            <td>{{ $studentRegistration->indexNum }}</td>
            <td>{{ $studentRegistration->nameWithInitial }}</td>
            <td>{{ $studentRegistration->fullNameInEnglishBlock }}</td>
            <td>{{ $studentRegistration->fullNameInSinhala }}</td>
            <td>{{ $studentRegistration->email }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
