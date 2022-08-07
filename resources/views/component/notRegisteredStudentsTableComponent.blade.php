
<td>{{ $notRegisteredStudent->nameWithInitials}}</td>
<td>{{ $notRegisteredStudent->regNum }}</td>
<td>{{ $notRegisteredStudent->indexNum }}</td>
<td>{{ $notRegisteredStudent->faculty }}</td>
<td>{{ $notRegisteredStudent->department }}</td>
<td>{{ $notRegisteredStudent->degreeName }}</td>
<td>
    <form action="{{ route('eligibleStudents.destroy',$notRegisteredStudent->id) }}" method="POST">

        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$notRegisteredStudent->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        @endif

        {{--                                        <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registered</a>--}}


    </form>
</td>
