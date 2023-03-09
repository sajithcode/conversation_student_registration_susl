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
                    <h2>New Convocation</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('convocation.index') }}">Back</a>
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

    <form action="{{ route('convocation.store') }}" id="selectform" method="POST">
        @csrf
        <div style="margin: 20px" class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Convocation Name:</strong>
                    <input required type="convocation" name="convocation" class="form-control" placeholder="Convocation Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Availability status for convocation:</strong>
                    <select required name="status" class="custom-select" id="inputGroupSelect01" >
                        <option value="Open">Open</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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
