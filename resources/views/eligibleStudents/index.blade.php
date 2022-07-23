@extends('layouts.app')


@section('content')
    <div style="margin: 50px"  class="">
        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

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
                        @if($studentRegistration->status==='Pending')
                            <div class="pull-left">
                                <h2 style="color: #00ffe1; font-weight: bold">Your Registration is Pending</h2>
                            </div>
                            <div class="row">
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="pull-right">
                                        <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                    </div>
                                </div>
                                <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="pull-right">
                                        <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                            @if($studentRegistration->status==='Reject')
                                <div class="pull-left">
                                    <h2 style="color: #ff5900; font-weight: bold">Your Registration is Rejected</h2>
                                    <p style="color:red;">{{$studentRegistration->statusMessage}}}</p>
                                </div>

                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="pull-right">
                                            <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="pull-right">
                                            <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($studentRegistration->status==='Accept')
                                <div class="pull-left">
                                    <h2 style="color: #0048ff; font-weight: bold">Your are already Registered</h2>
                                </div>

                            @endif
{{--                        <div class="pull-left">--}}
{{--                            <h2 style="color: #0048ff; font-weight: bold">Your are already Registered</h2>--}}
{{--                        </div>--}}
{{--                        <div class="pull-left">--}}
{{--                            <h2 style="color: #0048ff; font-weight: bold">Your Registration is {{$studentRegistration->status}}</h2>--}}
{{--                        </div>--}}
                    </div>
                @endif
            @endforeach


            @if ($i===1)
                <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                    <div class="pull-left">
                        <h2 style="color: #ff0000; font-weight: bold">Sorry! You are Not Eligible For Convocation</h2>
                    </div>
                </div>
            @endif


            @if ($i===2)
                <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                    <div class="pull-left">
                        <h2 style="color: #00a95a; font-weight: bold">Congratulation! You are Eligible  For Convocation</h2>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ route('studentRegistration.create') }}">Register Now</a>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="pull-right">
                                <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

{{--            @foreach ($eligibleStudents as $eligibleStudent)--}}
{{--                @if (strtoupper(trim($eligibleStudent->regNum)) === strtoupper(trim(Auth::user()->regNum)))--}}

{{--                    @foreach ($studentRegistrations as $studentRegistration)--}}
{{--                        @if (strtoupper(trim($studentRegistration->regNum)) === strtoupper(trim(Auth::user()->regNum)))--}}
{{--                            <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">--}}
{{--                                <div class="pull-right">--}}
{{--                                    <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

{{--                @endif--}}
{{--            @endforeach--}}

            @endif

            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Eligible Student List</h2>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>


    </div>

    <div style="margin: 50px">
        @if(checkPermission(['examinationBranch']))

            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-right">
                        <a class="btn btn-danger" href="{{ route('report.index') }}">Reports</a>
                    </div>
                </div>
            </div>
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
{{--======================--}}
            <div class="row">
            <form method="GET" action="{{route('export')}}" enctype="multipart/form-data">
                @csrf


                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-user float-right mb-3">Export All Registered Students</button>
                    {{--                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>--}}
                </div>
            </form>

            </div>

            <div class="row">


                <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10">
                                <div class="form-group">
                                    <strong>Faculty:</strong>

                                    <select required name="faculty" class="custom-select" id="inputGroupSelect01" >
                                        <option selected>Choose...</option>
                                        {{--                                                <option value="Graduate Studies">Graduate Studies</option>--}}
                                        <option value="Agricultural Sciences">Agricultural Sciences</option>
                                        <option value="Applied Sciences">Applied Sciences</option>
                                        <option value="Geomatics">Geomatics</option>
                                        <option value="Management Studies">Management Studies</option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Social Sciences & Languages">Social Sciences & Languages</option>
                                        <option value="Technology">Technology</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2" style="display: inline-flex;justify-content: center">
                                <button type="submit" class="btn btn-success btn-user float-right mb-3">Export Registered Students by Faculty</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>


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
                <div class="form-group" style="margin-top: 20px">
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
                    <th>Degree Name</th>

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
                        <td>{{ $eligibleStudent->degreeName }}</td>

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
                @if(checkPermission(['examinationBranch','viceChancellor']))
                <th>Faculty</th>
                <th>Department</th>
                <th>Degree Name</th>
                <th >Action</th>
                @endif
                @if(checkPermission(['mainStoreClark']))
                    <th>Cloak Issue</th>
                    <th>Cloak Return</th>
                    <th>Garland Return</th>
                    <th >Update</th>
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


                    @if(checkPermission(['mainStoreClark']))
                        <form action="{{ route('eligibleStudents.update',$eligibleStudent->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker1').datepicker({
                                            format: "mm/dd/yyyy",
                                            weekStart: 0,
                                            calendarWeeks: true,
                                            autoclose: true,
                                            todayHighlight: true,
                                            orientation: "auto",

                                        });
                                    });
                                </script>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input required value="{{ $eligibleStudent->cloakIssueDate }}" type="text" name="cloakIssueDate" class="form-control" placeholder="Index Number">

                                    {{--                                    <div class="form-group">--}}
{{--                                        <div class='input-group date' id='datetimepicker1+{{$eligibleStudent->id}}'>--}}
{{--                                            <input value="{{ $eligibleStudent->cloakIssueDate }}" placeholder="MM/DD/YYYY" required name="cloakIssueDate" type='text' class="form-control" />--}}
{{--                                            <span class="input-group-addon">--}}
{{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                        </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            </td>


                            <td>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker2').datepicker({
                                            format: "mm/dd/yyyy",
                                            weekStart: 0,
                                            calendarWeeks: true,
                                            autoclose: true,
                                            todayHighlight: true,
                                            orientation: "auto",

                                        });
                                    });
                                </script>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input required value="{{ $eligibleStudent->cloakReturnDate }}" type="text" name="cloakReturnDate" class="form-control" placeholder="Index Number">

                                    {{--                                    <div class="form-group">--}}
{{--                                        <div class='input-group date' id='datetimepicker2'>--}}
{{--                                            <input value="{{ $eligibleStudent->cloakReturnDate }}" placeholder="MM/DD/YYYY" required name="cloakReturnDate" type='text' class="form-control" />--}}
{{--                                            <span class="input-group-addon">--}}
{{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                        </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            </td>



{{--                            <td>{{ $eligibleStudent->cloakReturnDate }}</td>--}}
                            <td>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker3').datepicker({
                                            format: "mm/dd/yyyy",
                                            weekStart: 0,
                                            calendarWeeks: true,
                                            autoclose: true,
                                            todayHighlight: true,
                                            orientation: "auto",

                                        });
                                    });
                                </script>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input required value="{{ $eligibleStudent->garlandReturnDate }}" type="text" name="garlandReturnDate" class="form-control" placeholder="Index Number">

                                    {{--                                    <div class="form-group">--}}
{{--                                        <div class='input-group date' id='datetimepicker3'>--}}
{{--                                            <input value="{{ $eligibleStudent->garlandReturnDate }}" placeholder="MM/DD/YYYY" required name="garlandReturnDate" type='text' class="form-control" />--}}
{{--                                            <span class="input-group-addon">--}}
{{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
{{--                        </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            </td>


{{--                            <td>{{ $eligibleStudent->garlandReturnDate }}</td>--}}
                            <td>
                                <button type="submit" class="btn btn-danger">Update</button>
                            </td>
                        </form>
                    @endif


                    @if(checkPermission(['examinationBranch','viceChancellor']))
                    <td>{{ $eligibleStudent->faculty }}</td>
                    <td>{{ $eligibleStudent->department }}</td>
                    <td>{{ $eligibleStudent->degreeName }}</td>


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
                                    <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registration {{$studentRegistration->status}}</a>
{{--                                    <a>{{$studentRegistration->status}}</a>--}}
                                @endif
                            @endforeach

                        </form>
                    </td>
                    <td>

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
                    @if(checkPermission(['examinationBranch','viceChancellor']))
                    <th>Faculty</th>
                    <th>Department</th>
                    <th>Degree Name</th>
                        <th>Action</th>
                    @endif
                    @if(checkPermission(['mainStoreClark']))
                        <th>Cloak Issue</th>
                        <th>Cloak Return</th>
                        <th>Garland Return</th>
                        <th >Update</th>
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

                                @if(checkPermission(['mainStoreClark']))
                                    <form action="{{ route('eligibleStudents.update',$eligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker1').datepicker({
                                                        format: "mm/dd/yyyy",
                                                        weekStart: 0,
                                                        calendarWeeks: true,
                                                        autoclose: true,
                                                        todayHighlight: true,
                                                        orientation: "auto",

                                                    });
                                                });
                                            </script>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <input required value="{{ $eligibleStudent->cloakIssueDate }}" type="text" name="cloakIssueDate" class="form-control" placeholder="Index Number">

                                                {{--                                    <div class="form-group">--}}
                                                {{--                                        <div class='input-group date' id='datetimepicker1+{{$eligibleStudent->id}}'>--}}
                                                {{--                                            <input value="{{ $eligibleStudent->cloakIssueDate }}" placeholder="MM/DD/YYYY" required name="cloakIssueDate" type='text' class="form-control" />--}}
                                                {{--                                            <span class="input-group-addon">--}}
                                                {{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
                                                {{--                        </span>--}}
                                                {{--                                        </div>--}}
                                                {{--                                    </div>--}}
                                            </div>

                                        </td>


                                        <td>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker2').datepicker({
                                                        format: "mm/dd/yyyy",
                                                        weekStart: 0,
                                                        calendarWeeks: true,
                                                        autoclose: true,
                                                        todayHighlight: true,
                                                        orientation: "auto",

                                                    });
                                                });
                                            </script>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <input required value="{{ $eligibleStudent->cloakReturnDate }}" type="text" name="cloakReturnDate" class="form-control" placeholder="Index Number">

                                                {{--                                    <div class="form-group">--}}
                                                {{--                                        <div class='input-group date' id='datetimepicker2'>--}}
                                                {{--                                            <input value="{{ $eligibleStudent->cloakReturnDate }}" placeholder="MM/DD/YYYY" required name="cloakReturnDate" type='text' class="form-control" />--}}
                                                {{--                                            <span class="input-group-addon">--}}
                                                {{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
                                                {{--                        </span>--}}
                                                {{--                                        </div>--}}
                                                {{--                                    </div>--}}
                                            </div>

                                        </td>



                                        {{--                            <td>{{ $eligibleStudent->cloakReturnDate }}</td>--}}
                                        <td>
                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker3').datepicker({
                                                        format: "mm/dd/yyyy",
                                                        weekStart: 0,
                                                        calendarWeeks: true,
                                                        autoclose: true,
                                                        todayHighlight: true,
                                                        orientation: "auto",

                                                    });
                                                });
                                            </script>


                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <input required value="{{ $eligibleStudent->garlandReturnDate }}" type="text" name="garlandReturnDate" class="form-control" placeholder="Index Number">

                                                {{--                                    <div class="form-group">--}}
                                                {{--                                        <div class='input-group date' id='datetimepicker3'>--}}
                                                {{--                                            <input value="{{ $eligibleStudent->garlandReturnDate }}" placeholder="MM/DD/YYYY" required name="garlandReturnDate" type='text' class="form-control" />--}}
                                                {{--                                            <span class="input-group-addon">--}}
                                                {{--                            <span class="glyphicon glyphicon-calendar"></span>--}}
                                                {{--                        </span>--}}
                                                {{--                                        </div>--}}
                                                {{--                                    </div>--}}
                                            </div>

                                        </td>


                                        {{--                            <td>{{ $eligibleStudent->garlandReturnDate }}</td>--}}
                                        <td>
                                            <button type="submit" class="btn btn-danger">Update</button>
                                        </td>
                                    </form>
                                @endif

                                @if(checkPermission(['examinationBranch','viceChancellor']))
                        <td>{{ $eligibleStudent->faculty }}</td>
                        <td>{{ $eligibleStudent->department }}</td>
                                <td>{{ $eligibleStudent->degreeName }}</td>


                            <td>
                                <form action="{{ route('eligibleStudents.destroy',$eligibleStudent->id) }}" method="POST">





                                    @if(checkPermission(['examinationBranch']))
                                        <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    @endif

                                        <a class="btn btn-info" href="{{ route('studentRegistration.show',$studentRegistration->id) }}">Registration {{$studentRegistration->status}}</a>
                                        {{--                                    <a>{{$studentRegistration->status}}</a>--}}

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
                    <th>Degree Name</th>
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
                            <td>{{ $eligibleStudent->degreeName }}</td>

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
