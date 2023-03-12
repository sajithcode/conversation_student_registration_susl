<td>
    @if($allEligibleStudent->status=='Pending')
    <a style="background-color: #ffc200; font-weight: bold" class="btn">Registration {{$allEligibleStudent->status}}</a>
    @elseif($allEligibleStudent->status=='Reject')
            <a style="background-color: #ff3789; font-weight: bold" class="btn">Registration {{$allEligibleStudent->status}}</a>
    @elseif($allEligibleStudent->status=='Accept')
            <a style="background-color: #00ff6f; font-weight: bold" class="btn">Registration {{$allEligibleStudent->status}}</a>
    @else
        <a style="background-color: #ffffff; font-weight: bold" class="btn">Not Registered</a>
    @endif
</td>
<td>{{ $allEligibleStudent->nameWithInitials }}</td>
<td>{{ $allEligibleStudent->regNum }}</td>
<td>{{ $allEligibleStudent->indexNum }}</td>
<td>{{ $allEligibleStudent->faculty }}</td>
<td>{{ $allEligibleStudent->department }}</td>
<td>{{ $allEligibleStudent->degreeName }}</td>


<td>
    <form action="{{ route('eligibleStudents.destroy',$allEligibleStudent->id) }}" method="POST">

        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS','surveyAccess']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$allEligibleStudent->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            @if($allEligibleStudent->status=="Pending"||$allEligibleStudent->status=="Reject"||$allEligibleStudent->status=="Accept")
                <a style="margin-top: 5px" class="btn btn-info" href="{{ route('studentRegistration.show',$allEligibleStudent->sid) }}">Registration {{$allEligibleStudent->status}}</a>
                <a style="margin-top: 5px" class="btn btn-info" href="{{ route('survey.show',$allEligibleStudent->svid) }}">Survey</a>

            @endif
        @endif
    </form>
</td>
