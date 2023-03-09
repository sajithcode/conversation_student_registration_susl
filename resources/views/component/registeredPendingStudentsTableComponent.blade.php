<td>{{ $registeredPendingStudent->nameWithInitials }}</td>
<td>{{ $registeredPendingStudent->regNum }}</td>
<td>{{ $registeredPendingStudent->indexNum }}</td>
<td>{{ $registeredPendingStudent->faculty }}</td>
<td>{{ $registeredPendingStudent->department }}</td>
<td>{{ $registeredPendingStudent->degreeName }}</td>


<td>
    <form action="{{ route('eligibleStudents.destroy',$registeredPendingStudent->eid) }}" method="POST">





        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$registeredPendingStudent->eid) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
        @endif

{{--            <div class="visible-print text-center">--}}
{{--                {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)->generate( route('studentRegistration.show',$registeredPendingStudent->sid) ); !!}--}}
{{--                <p>Scan me to return to the original page.</p>--}}
{{--            </div>--}}
        <a class="btn btn-info" href="{{ route('studentRegistration.show',$registeredPendingStudent->sid) }}">Registration {{$registeredPendingStudent->status}}</a>
        {{--                                    <a>{{$studentRegistration->status}}</a>--}}

    </form>
</td>
