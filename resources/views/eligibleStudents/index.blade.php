@extends('layouts.app')


@section('content')
    <?php
//    session_start();
    $id = 0;
    $_SESSION["user_id"] = $id;

    ?>

        <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>



    <div style="margin: 50px">
        @if(checkPermission([ 'Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))

                <div class="pull-left">
                    <h2>Eligible Student List</h2>
                </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row mb-3">
            @if(checkPermission([ 'Admin' ]))
                    <div class="col" style="margin-bottom: 10px">
                        <div class="pull-center">
                            <a class="btn btn-dark" href="{{ route('survey.index') }}">Survey</a>
                        </div>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                            <div class="pull-center">
                                <a class="btn btn-dark" href="{{ route('user.index') }}">Users</a>
                            </div>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                            <div class="pull-center">
                                <a class="btn btn-dark" href="{{ route('convocation.index') }}">Convocation</a>
                            </div>
                    </div>
                    <div class="col" style="margin-bottom: 10px">
                            <div class="pull-center">
                                <a class="btn btn-dark" href="{{ route('faculty.index') }}">Faculty</a>
                            </div>
                    </div>



            @endif
            <div class="col" style="margin-bottom: 10px">
                    <div class="pull-center">
                        <a class="btn btn-danger" href="{{ route('report.index') }}">Reports</a>
                    </div>
            </div>
        <div class="col" style="margin-bottom: 10px">
                <div class="pull-center">
                    <a class="btn btn-success" href="{{ route('eligibleStudents.create') }}">Add a new student</a>
                </div>
        </div>

            <div class="col" style="margin-bottom: 10px">
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('importstudents') }}">Import Data</a>
                    </div>
            </div>
            </div>
{{--======================--}}
            <div class="row">
                @if(checkPermission(['Admin']))

                    <form method="GET" action="{{route('export')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-footer">
                            <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10" >
                            <div class="form-group">
                                <strong>Convocation:</strong>
                                {{ Form::select('convocationName', $convo, null, ['class' => 'form-control']) }}
                            </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2" style="display: inline-flex;justify-content: center">
                            <button type="submit" class="btn btn-success btn-user float-right mb-3">Export All Registered Students</button>
                            </div>
                            </div>
                            {{--                    <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a>--}}
                        </div>
                    </form>
                @endif
            </div>

            <div class="row">

                @if(checkPermission(['Admin']))

                <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10">
                                <div class="form-group">
                                    <strong>Convocation:</strong>
                                    {{ Form::select('convocationName', $convo, null, ['class' => 'form-control']) }}
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
                                        <option value="Graduate Studies">Graduate Studies</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2" style="display: inline-flex;justify-content: center">
                                <button type="submit" class="btn btn-success btn-user float-right mb-3">Export Registered Students by Faculty</button>
                            </div>
                        </div>

                    </div>
                </form>
                @endif
                    @if(checkPermission(['EBSC_Applied']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Applied Sciences" type="text" name="faculty" class="form-control" >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Applied Sciences</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                    @if(checkPermission(['EBSC_Agri']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Agricultural Sciences" type="text" name="faculty" class="form-control"  >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Agricultural Sciences</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                    @if(checkPermission(['EBSC_Geo']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Geomatics" type="text" name="faculty" class="form-control"  >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Geomatics</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                    @if(checkPermission(['EBSC_Mana']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Management Studies" type="text" name="faculty" class="form-control"  >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit"  class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Management Studies</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                    @if(checkPermission(['EBSC_Med']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Medicine" type="text" name="faculty" class="form-control"  >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Medicine</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                    @if(checkPermission(['EBSC_Social']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Social Sciences & Languages" type="text" name="faculty" class="form-control"  >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Social Sciences & Languages</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                    @if(checkPermission(['EBSC_Tech']))
                        <form method="GET" action="{{route('exportbyfaculty')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-footer">
                                <div class="row">
                                    <input style="display: none" required value="Technology" type="text" name="faculty" class="form-control" >

                                    <div class="col-xs-12 col-sm-12 col-md-12" style="display: inline-flex;justify-content: center">
                                        <button type="submit" class="btn btn-success btn-user float-right mb-3">Export The Registered Students List in Faculty of Technology</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
            </div>


        @endif


{{--            <script>--}}

{{--                $(function() {--}}

{{--                    // run on change for the selectbox--}}
{{--                    $( "#frm_duration" ).change(function() {--}}
{{--                        updateDurationDivs();--}}
{{--                    });--}}

{{--                    // handle the updating of the duration divs--}}
{{--                    function updateDurationDivs() {--}}
{{--                        // hide all form-duration-divs--}}
{{--                        $('.form-duration-div').hide();--}}

{{--                        var divKey = $( "#frm_duration option:selected" ).val();--}}
{{--                        $('#divFrm'+divKey).show();--}}
{{--                    }--}}

{{--                    // run at load, for the currently selected div to show up--}}
{{--                    updateDurationDivs();--}}

{{--                });--}}
{{--            </script>--}}

            @if(checkPermission(['Admin','mainStoreClark','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
{{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}

                <form action="{{ route('getESByFormRequest') }}" id="selectform" method="GET">
                    @csrf
                    <div style="margin: 20px" class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group" style="margin-top: 20px">
                                <div>
                                    <select required name="studentRegEligible" class="form-control" id="frm_duration">
                                        {{--                            <option selected>Choose</option>--}}
                                        <option selected value="All">All Eligible Students</option>
                                        <option value="Registered">Registered Students</option>
                                        <option value="Pending">Registered Students Pending</option>
                                        <option value="Reject">Registered Students Rejected</option>
                                        <option value="Accept">Registered Students Accepted</option>
                                        <option value="NotRegistered">Not Registered Students</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group" style="margin-top: 20px">
                                <div>
                                    <select required name="faculty" class="form-control" id="frm_duration">
                                        {{--                            <option selected>Choose</option>--}}
                                        <option value="All Faculty">All Faculty</option>
                                        <option value="Agricultural Sciences">Agricultural Sciences</option>
                                        <option value="Applied Sciences">Applied Sciences</option>
                                        <option value="Geomatics">Geomatics</option>
                                        <option value="Management Studies">Management Studies</option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Social Sciences & Languages">Social Sciences & Languages</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Graduate Studies">Graduate Studies</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>




                    </div>

                </form>
                <div style="margin-bottom:50px;margin-top: -30px" class="row">
                    <div class="col-xs-11 col-sm-11 col-md-11 text-center">
                    </div>
                    <div  class="col-xs-1 col-sm-1 col-md-1">
                        <button class="btn btn-dark" onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;">
                            Reset
                        </button>
                    </div>
                </div>




{{--            </div>--}}
            @endif






{{--            =================all eligible students=============--}}
            <div style="overflow-x:auto;">
        <table id="divFrmAll" class="table table-bordered form-duration-div">
            <tr>
                            <th>No</th>
                @if(checkPermission([ 'Admin','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))

                <th>Registration status</th>

                @endif
                <th>Name</th>
                <th style="width: auto">Register Number</th>
                <th>Index Number</th>
                @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
                <th>Faculty</th>
                <th>Department</th>
                <th>Degree Name</th>
                <th >Action</th>
                @endif
                @if(checkPermission(['mainStoreClark','Admin']))
                    <th>Cloak Issue</th>
                    <th>Cloak Return</th>
                    <th>Garland Return</th>
                 @endif
            </tr>
            @php
                $a = 0
            @endphp
            @foreach ($students as $allEligibleStudent)
                <tr>

                    @if(checkPermission(['Admin','viceChancellor']))
                        <td>{{ ++$a }}</td>
                        @include('component.allEligibleStudentsTableComponent')
                    @endif
                    @if(checkPermission(['EBSC_Applied']))
                        @if($allEligibleStudent->faculty == 'Applied Sciences')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_Geo']))
                        @if($allEligibleStudent->faculty == 'Geomatics')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_Social']))
                        @if($allEligibleStudent->faculty == 'Social Sciences & Languages')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_Mana']))
                        @if($allEligibleStudent->faculty == 'Management Studies')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_Med']))
                        @if($allEligibleStudent->faculty == 'Medicine')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_Agri']))
                        @if($allEligibleStudent->faculty == 'Agricultural Sciences')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_Tech']))
                        @if($allEligibleStudent->faculty == 'Technology')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif
                    @if(checkPermission(['EBSC_GS']))
                        @if($allEligibleStudent->faculty == 'Graduate Studies')
                            <td>{{ ++$a }}</td>
                            @include('component.allEligibleStudentsTableComponent')
                        @endif
                    @endif

{{--                    @if(checkPermission(['examinationBranch','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))--}}

{{--                        --}}

{{--                    @endif--}}
                        @if(checkPermission(['Admin']))
                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('eligibleStudents.update',$allEligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Not Yet" name="cloakIssueDate">
                                        <input type="checkbox" value={{Carbon\Carbon::now()}} name="cloakIssueDate" @if($allEligibleStudent->cloakIssueDate!='Not Yet') checked @endif>


                                        <div>{{ $allEligibleStudent->cloakIssueDate }}</div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>

                            </td>


                            <td>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('eligibleStudents.update',$allEligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Not Yet" name="cloakReturnDate">
                                        <input type="checkbox" value={{Carbon\Carbon::now()}} name="cloakReturnDate" @if($allEligibleStudent->cloakReturnDate!='Not Yet') checked @endif>


                                        <div>{{ $allEligibleStudent->cloakReturnDate }}</div>
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </form>
                                </div>

                            </td>

                            <td>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('eligibleStudents.update',$allEligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Not Yet" name="garlandReturnDate">
                                        <input type="checkbox" value={{Carbon\Carbon::now()}} name="garlandReturnDate" @if($allEligibleStudent->garlandReturnDate!='Not Yet') checked @endif>


                                        <div>{{ $allEligibleStudent->garlandReturnDate }}</div>
                                        <button type="submit" class="btn btn-danger">Update</button>
                                    </form>
                                </div>

                            </td>
                        @endif
                    @if(checkPermission(['mainStoreClark']))
                            <td>{{ ++$a }}</td>
                            <td>{{ $allEligibleStudent->nameWithInitials }}</td>
                            <td>{{ $allEligibleStudent->regNum }}</td>
                            <td>{{ $allEligibleStudent->indexNum }}</td>

                            <td>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('eligibleStudents.update',$allEligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Not Yet" name="cloakIssueDate">
                                        <input type="checkbox" value={{Carbon\Carbon::now()}} name="cloakIssueDate" @if($allEligibleStudent->cloakIssueDate!='Not Yet') checked @endif>


                                        <div>{{ $allEligibleStudent->cloakIssueDate }}</div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>

                            </td>


                            <td>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('eligibleStudents.update',$allEligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="Not Yet" name="cloakReturnDate">
                                        <input type="checkbox" value={{Carbon\Carbon::now()}} name="cloakReturnDate" @if($allEligibleStudent->cloakReturnDate!='Not Yet') checked @endif>


                                        <div>{{ $allEligibleStudent->cloakReturnDate }}</div>
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </form>
                                </div>

                            </td>

                            <td>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <form action="{{ route('eligibleStudents.update',$allEligibleStudent->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                    <input type="hidden" value="Not Yet" name="garlandReturnDate">
                                    <input type="checkbox" value={{Carbon\Carbon::now()}} name="garlandReturnDate" @if($allEligibleStudent->garlandReturnDate!='Not Yet') checked @endif>


                                    <div>{{ $allEligibleStudent->garlandReturnDate }}</div>
                                        <button type="submit" class="btn btn-danger">Update</button>
                                    </form>
                                </div>

                            </td>


{{--                            <td>{{ $eligibleStudent->garlandReturnDate }}</td>--}}


                    @endif



                </tr>
            @endforeach
        </table>
            </div>

{{--            ===========Registered Table==========--}}




{{--            Registered Pending Students--}}



{{--            Registered students Reject--}}



{{--            Registered Accepted--}}



            {{--            =========== Not Registered Table==========--}}




    </div>








@endsection
