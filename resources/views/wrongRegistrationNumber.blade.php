@extends('layouts.app')

@section('content')



    <div class="row" style="display: inline-flex; justify-content: center; width: 100%; " >

        <div style="display: inline-flex; justify-content: center; width: 100%;" class="col-xs-12 col-sm-12 col-md-12">
            <div style="font-weight: bold; font-size: 4vw;margin: 16%">Wrong Registration Number</div>
        </div>
        <div style="display: inline-flex; justify-content: center; width: 100%;" class="col-xs-12 col-sm-12 col-md-12">
        <a class="btn btn-primary" href="{{ url('/verifyEmail') }}">Retry</a>
        </div>

        {{--        </div>--}}
    </div>


@endsection
