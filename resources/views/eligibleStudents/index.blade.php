@extends('layouts.app')


@section('content')
    <div style="margin: 50px"  class="">

        @if(checkPermission(['student']))

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">

            @php
                $i = 1
            @endphp
            @foreach (($eligibleStudents) as $eligibleStudent)

                @if (strtoupper(trim($eligibleStudent->regNum)) === strtoupper(trim(Auth::user()->regNum)))
                    @php
                        $i = 2
                    @endphp

                @endif
            @endforeach

{{--            1--}}

            @foreach ($studentRegistrations as $studentRegistration)
                @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim(Auth::user()->regNum)))
                    @php
                        $i = 3
                    @endphp
                    <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                        <div class="pull-left">
                            <h2 style="color: #0048ff; font-weight: bold">Your are already Registered</h2>
                        </div>
                    </div>
                @endif
            @endforeach


            @if ($i===1)
                <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                    <div class="pull-left">
                        <h2 style="color: #ff0000; font-weight: bold">Sorry! You are Not Eligible For Conversation</h2>
                    </div>
                </div>
            @endif


            @if ($i===2)
                <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                    <div class="pull-left">
                        <h2 style="color: #00a95a; font-weight: bold">Congratulation! You are Eligible  For Conversation</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('studentRegistration.create') }}">Register Now</a>
                    </div>
                </div>
            @endif

            @foreach ($eligibleStudents as $eligibleStudent)
                @if (strtoupper(trim($eligibleStudent->regNum)) === strtoupper(trim(Auth::user()->regNum)))

                    @foreach ($studentRegistrations as $studentRegistration)
                        @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim(Auth::user()->regNum)))
                            <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                                <div class="pull-right">
                                    <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                @endif
            @endforeach

            @endif

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Eligible Student List</h2>
                </div>
            </div>

        </div>


    </div>

    <div style="margin: 50px">
        @if(checkPermission(['examinationBranch']))
        <div class="row" style="margin-bottom: 10px">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('eligibleStudents.create') }}">Add a new student</a>
                </div>
            </div>
        </div>

            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('importstudents') }}">Import Data</a>
                    </div>
                </div>
            </div>

{{--            <div class="row" style="margin-bottom: 10px">--}}
{{--                <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                    <div class="pull-right">--}}
{{--                        <a class="btn btn-info" href="{{ route('eligibleStudents.show') }}">Registered student List</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

        @endif


            <script>

                $(function() {

                    // run on change for the selectbox
                    $( "#frm_duration" ).change(function() {
                        updateDurationDivs();
                    });

                    // handle the updating of the duration divs
                    function updateDurationDivs() {
                        // hide all form-duration-divs
                        $('.form-duration-div').hide();

                        var divKey = $( "#frm_duration option:selected" ).val();
                        $('#divFrm'+divKey).show();
                    }

                    // run at load, for the currently selected div to show up
                    updateDurationDivs();

                });
            </script>

            @if(checkPermission(['examinationBranch','mainStoreClark','viceChancellor']))
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
                <div class="form-group">
                    <div>
                        <select required name="attendance" class="form-control" id="frm_duration">
{{--                            <option selected>Choose</option>--}}
                            <option selected value="All">All Eligible Students</option>
                            <option value="Registered">Registered Students</option>
                            <option value="NotRegistered">Not Registered Students</option>
                        </select>
                    </div>
                </div>
{{--            </div>--}}
            @endif



{{--            =================list show for students==============--}}
            @if(checkPermission(['student']))
            <table  class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Register Number</th>
                    <th>Index Number</th>
                    <th>Faculty</th>
                    <th>Department</th>

                </tr>
                @php
                    $a = 0
                @endphp
                @foreach ($eligibleStudents as $eligibleStudent)
                    <tr>
                        <td>{{ ++$a }}</td>
                        <td>{{ $eligibleStudent->nameWithInitials }}</td>
                        <td>{{ $eligibleStudent->regNum }}</td>
                        <td>{{ $eligibleStudent->indexNum }}</td>
                        <td>{{ $eligibleStudent->faculty }}</td>
                        <td>{{ $eligibleStudent->department }}</td>

                    </tr>
                @endforeach
            </table>
            @endif

{{--            =================all eligible students=============--}}
        <table id="divFrmAll" style="display:none" class="table table-bordered form-duration-div">
            <tr>
                            <th>No</th>
                <th>Name</th>
                <th>Register Number</th>
                <th>Index Number</th>
                <th>Faculty</th>
                <th>Department</th>
                @if(checkPermission(['examinationBranch','mainStoreClark','viceChancellor']))
                <th width="280px">Action</th>
                @endif
            </tr>
            @php
                $a = 0
            @endphp
            @foreach ($eligibleStudents as $eligibleStudent)
                <tr>
                    <td>{{ ++$a }}</td>
                    <td>{{ $eligibleStudent->nameWithInitials }}</td>
                    <td>{{ $eligibleStudent->regNum }}</td>
                    <td>{{ $eligibleStudent->indexNum }}</td>
                    <td>{{ $eligibleStudent->faculty }}</td>
                    <td>{{ $eligibleStudent->department }}</td>
                    @if(checkPermission(['examinationBranch','mainStoreClark','viceChancellor']))
                    <td>
                        <form action="{{ route('eligibleStudents.destroy',$eligibleStudent->id) }}" method="POST">





                            @if(checkPermission(['examinationBranch']))
                            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                            @endif

                            @foreach ($studentRegistrations as $studentRegistration)
                                @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim($eligibleStudent->regNum)))
                                    <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registered</a>
                                @endif
                            @endforeach

                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </table>


{{--            ===========Registered Table==========--}}

            <table id="divFrmRegistered" style="display:none" class="table table-bordered form-duration-div">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Register Number</th>
                    <th>Index Number</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    @if(checkPermission(['examinationBranch','mainStoreClark','viceChancellor']))
                        <th width="280px">Action</th>
                    @endif
                </tr>
                @php
                    $a = 0
                @endphp
                @foreach ($eligibleStudents as $eligibleStudent)
                    <tr>
                        @foreach ($studentRegistrations as $studentRegistration)
                            @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim($eligibleStudent->regNum)))

{{--                                @php--}}
{{--                                    return 0--}}
{{--                                @endphp--}}
                            {{--                        ==--}}
                        <td>{{ ++$a }}</td>
                        <td>{{ $eligibleStudent->nameWithInitials }}</td>
                        <td>{{ $eligibleStudent->regNum }}</td>
                        <td>{{ $eligibleStudent->indexNum }}</td>
                        <td>{{ $eligibleStudent->faculty }}</td>
                        <td>{{ $eligibleStudent->department }}</td>
                        @if(checkPermission(['examinationBranch','mainStoreClark','viceChancellor']))
                            <td>
                                <form action="{{ route('eligibleStudents.destroy',$eligibleStudent->id) }}" method="POST">





                                    @if(checkPermission(['examinationBranch']))
                                        <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    @endif

                                                    <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registered</a>


                                </form>
                            </td>
                        @endif


                        @endif

                        @endforeach
{{--                        ==--}}
                    </tr>
                @endforeach
            </table>


            {{--            =========== Not Registered Table==========--}}

            <table id="divFrmNotRegistered" style="display:none" class="table table-bordered form-duration-div">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Register Number</th>
                    <th>Index Number</th>
                    <th>Faculty</th>
                    <th>Department</th>
                    @if(checkPermission(['examinationBranch']))
                        <th width="280px">Action</th>
                    @endif
                </tr>
                @php
                    $a = 0
                @endphp
                @foreach ($eligibleStudents as $eligibleStudent)
                    <tr>
                        @php
                            $x = 0
                        @endphp
                        @foreach ($studentRegistrations as $studentRegistration)
                            @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim($eligibleStudent->regNum)))
                                @php
                                    $x = 1
                                @endphp
                                @break

                            @endif

                        @endforeach
                        {{--                        ==--}}
                        @if($x===0)
                            <td>{{ ++$a }}</td>
                            <td>{{ $eligibleStudent->nameWithInitials }}</td>
                            <td>{{ $eligibleStudent->regNum }}</td>
                            <td>{{ $eligibleStudent->indexNum }}</td>
                            <td>{{ $eligibleStudent->faculty }}</td>
                            <td>{{ $eligibleStudent->department }}</td>
                            @if(checkPermission(['examinationBranch']))
                                <td>
                                    <form action="{{ route('eligibleStudents.destroy',$eligibleStudent->id) }}" method="POST">





                                        @if(checkPermission(['examinationBranch']))
                                            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        @endif

{{--                                        <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registered</a>--}}


                                    </form>
                                </td>
                            @endif

                        @endif
                    </tr>
                @endforeach
            </table>


    </div>








@endsection
