@extends('layouts.app')

@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Student</h2>
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

        <form action="{{ route('eligibleStudents.update',$eligibleStudent->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name with Initials:</strong>
                        <input value="{{ $eligibleStudent->nameWithInitials }}" type="text" name="nameWithInitials" class="form-control" placeholder="Name with Initials">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Registration Number:</strong>
                        <input value="{{ $eligibleStudent->regNum }}" type="text" name="regNum" class="form-control" placeholder="Registration Number">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Index Number:</strong>
                        <input value="{{ $eligibleStudent->indexNum }}" type="text" name="indexNum" class="form-control" placeholder="Index Number">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Faculty:</strong>

                        <select name="faculty" class="custom-select" id="inputGroupSelect01" >
                            <option selected>{{ $eligibleStudent->faculty }}</option>
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
                        <input value="{{ $eligibleStudent->department }}" type="text" name="department" class="form-control"
                               placeholder="Department">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

        </form>
    </div>

@endsection
