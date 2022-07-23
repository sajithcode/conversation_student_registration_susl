@extends('layouts.app')

@section('content')



    <div style="display: inline-flex; justify-content: center; width: 100%;" >


    <form  action="{{ route('sendConfirmedMail') }}" method="POST">
        @csrf
        {{--    @method('PUT')--}}

        <div style="margin: 60px" class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">
                    <strong>Email Address:</strong>
{{--                    <input required type="text" name="email" class="form-control" placeholder="Email">--}}
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Verify</button>
            </div>


        </div>

    </form>

    </div>


@endsection
