<td>{{ $registeredStudent->nameWithInitials }}</td>
<td>{{ $registeredStudent->regNum }}</td>
<td>{{ $registeredStudent->indexNum }}</td>
<td>{{ $registeredStudent->faculty }}</td>
<td>{{ $registeredStudent->department }}</td>
<td>{{ $registeredStudent->degreeName }}</td>


<td>
    <form action="{{ route('eligibleStudents.destroy',$registeredStudent->eid) }}" method="POST">





        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$registeredStudent->eid) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        @endif

        <a class="btn btn-info" href="{{ route('studentRegistration.show',$registeredStudent->sid) }}">Registration {{$registeredStudent->status}}</a>
        {{--                                    <a>{{$studentRegistration->status}}</a>--}}

    </form>
</td>
