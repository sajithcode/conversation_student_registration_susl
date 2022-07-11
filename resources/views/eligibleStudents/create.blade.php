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
                    <h2>Add a new student</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
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

    <form action="{{ route('eligibleStudents.store') }}" id="selectform" method="POST">
        @csrf
        <div style="margin: 20px" class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name with Initials:</strong>
                    <input required type="text" name="nameWithInitials" class="form-control" placeholder="Name with Initials">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Registration Number:</strong>
                    <input required type="text" name="regNum" class="form-control" placeholder="Registration Number">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Index Number:</strong>
                    <input required type="text" name="indexNum" class="form-control" placeholder="Index Number">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
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


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Department:</strong>
                    <input required type="text" name="department" class="form-control"
                           placeholder="Department">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Degree Name:</strong>
                    <input required type="text" name="degreeName" class="form-control"
                           placeholder="Degree Name">
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
