@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Registration of {{ $studentRegistration->nameWithInitial }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin: 50px">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Registration Status:</strong>
                {{ $studentRegistration->status }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Full name in english block letters:</strong>
                {{ $studentRegistration->fullNameInEnglishBlock }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Full Name in English Block Letters:</strong>
                {{ $studentRegistration->fullNameInSinhala }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                {{ $studentRegistration->gender }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIC:</strong>
                {{ $studentRegistration->nic }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Postal Address:</strong>
                {{ $studentRegistration->address }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mobile Number:</strong>
                {{ $studentRegistration->mobileNumber }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $studentRegistration->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Faculty:</strong>
                {{ $studentRegistration->faculty }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Department:</strong>
                {{ $studentRegistration->department }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name of the degree to be conferred:</strong>
                {{ $studentRegistration->degreeName }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Register Number:</strong>
                {{ $studentRegistration->regNum }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Index Number:</strong>
                {{ $studentRegistration->indexNum }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Month and year of the Degree Examination:</strong>
                {{ $studentRegistration->monthAndYearExamination }}
            </div>
        </div>

{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <div class="form-group">--}}
{{--                <strong>Year of the Degree Examination:</strong>--}}
{{--                {{ $studentRegistration->yearExamination }}--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class:</strong>
                {{ $studentRegistration->degreeClass }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Whether he/she attend the convocation:</strong>
                {{ $studentRegistration->attendance }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Visitor 1 Name:</strong>
                {{ $studentRegistration->nameVisitor1 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Visitor 1 NIC:</strong>
                {{ $studentRegistration->nicVisitor1 }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Visitor 2 Name:</strong>
                {{ $studentRegistration->nameVisitor2 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Visitor 2 NIC:</strong>
                {{ $studentRegistration->nicVisitor2 }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payment Receipt:</strong>
                <img src="{{ asset('/images/'.$studentRegistration->image) }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Signed Date:</strong>
                {{ $studentRegistration->signedDate }}
            </div>
        </div>




        @if(checkPermission(['examinationBranch']))

        <form action="{{ route('studentRegistration.update',$studentRegistration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin: 60px" class="row">


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

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Review Status:</strong>
                        <div>
                            <select name="status" class="form-control" id="frm_duration">
                                <option selected>{{ $studentRegistration->status }}</option>
                                <option value="Pending">Pending</option>
                                <option value="Accept">Accept</option>
                                <option value="Reject">Reject</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div id="divFrmReject" class="form-group form-duration-div" style="display:none">
                    <input value="{{ $studentRegistration->statusMessage }}" name="statusMessage" type='text' class="form-control" />

                </div>





                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Reviewed</button>
                </div>
            </div>

        </form>
        @endif
    </div>
@endsection
