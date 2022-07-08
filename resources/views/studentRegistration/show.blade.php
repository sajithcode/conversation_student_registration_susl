@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 50px">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Registration of {{ $studentRegistration->indexNum }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin: 50px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Index Number:</strong>
                {{ $studentRegistration->indexNum }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIC:</strong>
                {{ $studentRegistration->nic }}
            </div>
        </div>
    </div>
@endsection
