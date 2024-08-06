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
    @if($allEligibleStudent->id)
        @if($allEligibleStudent->sid)
            @if($allEligibleStudent->svid)
                <form method="GET" action="{{route('registerdwithsurveyreset')}}" enctype="multipart/form-data">
                    @csrf
                    <input style="display: none" required value="{{$allEligibleStudent->id}}" type="text" name="eid" class="form-control" >
                    <input style="display: none" required value="{{$allEligibleStudent->sid}}" type="text" name="sid" class="form-control" >
                    <input style="display: none" required value="{{$allEligibleStudent->svid}}" type="text" name="svid" class="form-control" >
                    <button type="submit" class="btn btn-outline-warning">Reset</button>
                </form>
            @else
{{--                <a style="margin-top: 5px" class="btn btn-info" onclick="{{ App\Http\Controllers\StudentRegistrationController::registerdReset($allEligibleStudent->id,$allEligibleStudent->sid)}}">Registration {{$allEligibleStudent->status}}</a>--}}
                <form method="GET" action="{{route('registerdreset')}}" enctype="multipart/form-data">
                    @csrf
                    <input style="display: none" required value="{{$allEligibleStudent->id}}" type="text" name="eid" class="form-control" >
                    <input style="display: none" required value="{{$allEligibleStudent->sid}}" type="text" name="sid" class="form-control" >
                    <button type="submit" class="btn btn-outline-warning">Reset</button>
                </form>
{{--                <form action="{{ App\Http\Controllers\StudentRegistrationController::registerdReset($allEligibleStudent->id,$allEligibleStudent->sid)}}}" >--}}
{{--                    <button type="submit" class="btn btn-outline-warning">Reset</button>--}}
{{--                </form>--}}
            @endif
        @else
            <form method="GET" action="{{route('eligiblestudentreset')}}" enctype="multipart/form-data">
                @csrf
                <input style="display: none" required value="{{$allEligibleStudent->id}}" type="text" name="eid" class="form-control" >
                <button type="submit" class="btn btn-outline-warning">Reset</button>
            </form>
        @endif
    @endif
    <form action="{{ route('eligibleStudents.destroy',$allEligibleStudent->id) }}" method="POST">

        @if(checkPermission(['Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS','surveyAccess','EBSC_Computing']))
            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$allEligibleStudent->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>



{{--            App\Http\Controllers\SurveyController::checkSurvey(strtoupper(trim(str_replace(' ', '', str_replace('/', '', Auth::user()->regNum)))));--}}





            @if($allEligibleStudent->status=="Pending"||$allEligibleStudent->status=="Reject"||$allEligibleStudent->status=="Accept")
                <a style="margin-top: 5px" class="btn btn-info" href="{{ route('studentRegistration.show',$allEligibleStudent->sid) }}">Registration {{$allEligibleStudent->status}}</a>
                @if($allEligibleStudent->svid)
                <a style="margin-top: 5px" class="btn btn-info" href="{{ route('survey.show',$allEligibleStudent->svid) }}">Survey</a>
                @endif
            @endif
        @endif
    </form>
</td>
