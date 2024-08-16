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
            <div style="display: none" class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Registration Number:</strong>
                    <input value={{Auth::user()->regNum}} required type="text" name="regNum" class="form-control" placeholder="regNum">
                </div>
            </div>
            <div style="display: none" class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input value={{Auth::user()->email}} required type="text" name="email" class="form-control" placeholder="email">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Faculty:</strong>

                    <select required name="faculty" class="custom-select" id="inputGroupSelect01" >
                        <option selected>Choose...</option>
                        {{--                                                <option value="Graduate Studies">Graduate Studies</option>--}}
                        <option value="Computing">Computing</option>
                        <option value="Agricultural Sciences">Agricultural Sciences</option>
                        <option value="Applied Sciences">Applied Sciences</option>
                        <option value="Geomatics">Geomatics</option>
                        <option value="Management Studies">Management Studies</option>
                        <option value="Medicine">Medicine</option>
                        <option value="Social Sciences & Languages">Social Sciences & Languages</option>
                        <option value="Technology">Technology</option>
                        <option value="Sport">Sport</option>
                        <option value="Graduate Studies">Graduate Studies</option>
                    </select>
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
