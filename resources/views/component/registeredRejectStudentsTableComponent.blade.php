<td>{{ $registeredRejectStudent->nameWithInitials }}</td>
<td>{{ $registeredRejectStudent->regNum }}</td>
<td>{{ $registeredRejectStudent->indexNum }}</td>
<td>{{ $registeredRejectStudent->faculty }}</td>
<td>{{ $registeredRejectStudent->department }}</td>
<td>{{ $registeredRejectStudent->degreeName }}</td>


<td>
    <form action="{{ route('eligibleStudents.destroy',$registeredRejectStudent->eid) }}" method="POST">





        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$registeredRejectStudent->eid) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        @endif

        <a class="btn btn-info" href="{{ route('studentRegistration.show',$registeredRejectStudent->sid) }}">Registration {{$registeredRejectStudent->status}}</a>
        {{--                                    <a>{{$studentRegistration->status}}</a>--}}

    </form>
</td>
