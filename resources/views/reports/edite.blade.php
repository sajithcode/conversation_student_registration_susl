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
                    <h2>Create a Report</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('checkData') }}"> Back</a>
                </div>
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

    <form action="{{ route('report.store') }}" id="selectform" method="POST">
        @csrf
        <div style="margin: 20px" class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input required type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea required type="text" name="description" class="form-control" placeholder="Description">
                        </textarea>
                </div>
            </div>




            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
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
@endsection
