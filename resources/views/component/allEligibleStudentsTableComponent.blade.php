
<td>{{ $eligibleStudent->nameWithInitials }}</td>
<td>{{ $eligibleStudent->regNum }}</td>
<td>{{ $eligibleStudent->indexNum }}</td>
<td>{{ $eligibleStudent->faculty }}</td>
<td>{{ $eligibleStudent->department }}</td>
<td>{{ $eligibleStudent->degreeName }}</td>


<td>
    <form action="{{ route('eligibleStudents.destroy',$eligibleStudent->id) }}" method="POST">





        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        @endif

        @foreach ($studentRegistrations as $studentRegistration)
            @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim($eligibleStudent->regNum)))
                <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registration {{$studentRegistration->status}}</a>
                {{--                                    <a>{{$studentRegistration->status}}</a>--}}
            @endif
        @endforeach

    </form>
</td>
