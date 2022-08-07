<td>{{ $registeredAcceptStudent->nameWithInitials }}</td>
<td>{{ $registeredAcceptStudent->regNum }}</td>
<td>{{ $registeredAcceptStudent->indexNum }}</td>
<td>{{ $registeredAcceptStudent->faculty }}</td>
<td>{{ $registeredAcceptStudent->department }}</td>
<td>{{ $registeredAcceptStudent->degreeName }}</td>


<td>
    <form action="{{ route('eligibleStudents.destroy',$registeredAcceptStudent->eid) }}" method="POST">





        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$registeredAcceptStudent->eid) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        @endif

        <a class="btn btn-info" href="{{ route('studentRegistration.show',$registeredAcceptStudent->sid) }}">Registration {{$registeredAcceptStudent->status}}</a>
        {{--                                    <a>{{$studentRegistration->status}}</a>--}}

    </form>
</td>
