<table>
    <thead>
    <tr>
        <th>Registration Number</th>
        <th>Index Number</th>
        <th>Name With Initial</th>
        <th>Full Name In English Block Letter</th>
        <th>Full Name In Sinhala</th>
        <th>Email</th>
        <th>NIC</th>
        <th>Faculty</th>
        <th>Department</th>
        <th>Degree Name</th>
        <th>Degree Class</th>

        <th>Gender</th>
        <th>Mobile Number</th>
        <th>Address</th>
        <th>Month and year of examination</th>
        <th>Attendance</th>
        <th>Visitor 1 Name</th>
        <th>Visitor 1 NIC</th>
        <th>Visitor 2 Name</th>
        <th>Visitor 2 NIC</th>
        <th>Signed Date</th>
        <th>Status</th>

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
            <td>{{ $studentRegistration->nic }}</td>
            <td>{{ $studentRegistration->faculty }}</td>
            <td>{{ $studentRegistration->department }}</td>
            <td>{{ $studentRegistration->degreeName }}</td>
            <td>{{ $studentRegistration->degreeClass }}</td>

            <td>{{ $studentRegistration->gender }}</td>
            <td>{{ $studentRegistration->mobileNumber }}</td>
            <td>{{ $studentRegistration->address }}</td>
            <td>{{ $studentRegistration->monthAndYearExamination }}</td>
            <td>{{ $studentRegistration->attendance }}</td>
            <td>{{ $studentRegistration->nameVisitor1 }}</td>
            <td>{{ $studentRegistration->nicVisitor1 }}</td>
            <td>{{ $studentRegistration->nameVisitor2 }}</td>
            <td>{{ $studentRegistration->nicVisitor2 }}</td>
            <td>{{ $studentRegistration->signedDate }}</td>
            <td>{{ $studentRegistration->status }}</td>


        </tr>
    @endforeach
    </tbody>
</table>
