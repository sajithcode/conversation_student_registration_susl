@extends('layouts.app')

@section('content')



    <div class="">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div style="margin: 20px" class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Registration</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('studentRegistration.create') }}"> Register</a>
                </div>
            </div>
        </div>
    </div>



@endsection
