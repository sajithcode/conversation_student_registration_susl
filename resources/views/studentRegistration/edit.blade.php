@extends('layouts.app')

@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Registration</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('studentRegistration.update',$studentRegistration->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Index Number:</strong>
                        <input value="{{ $studentRegistration->indexNum }}" type="text" name="indexNum" class="form-control" placeholder="Index Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIC:</strong>
                        <input value="{{ $studentRegistration->nic }}" type="text" name="nic" class="form-control" placeholder="NIC Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mobile Number:</strong>
                        <input value="{{ $studentRegistration->mobileNumber }}" type="text" name="mobileNumber" class="form-control" placeholder="Mobile Number">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>

@endsection
