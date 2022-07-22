@extends('layouts.app')

@section('content')

                <form  method="PUT" action="{{ route('getByRegNum') }}">
                    @csrf
                    @method('PUT')

                    <div style="margin: 60px" class="row">
                        <?php
                        session_start();
                        //            $id = 10;
                        //            $_SESSION["user_id"] = $id;
                        //
                        //                           session_start();
                        echo $_SESSION["user_id"];
                        echo $_SESSION["email"];
                        $email = $_SESSION["email"];

                        //            session_destroy();
                        ?>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Registration Number:</strong>

                                <input value={{$email}} required type="text" name="regNum" class="form-control" placeholder="Registration Number">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Convocation Registration</button>
                        </div>

                    </div>

                </form>

{{--<form  action="{{ route('sendConfirmedMail') }}" method="POST">--}}
{{--    @csrf--}}
{{--    @method('PUT')--}}

{{--    <div style="margin: 60px" class="row">--}}

{{--        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--            <input style="display: none" value={{$std->id}} required type="text" name="stdID" class="form-control" placeholder="stdID">--}}

{{--            <div class="form-group">--}}
{{--                <strong>Email Address:</strong>--}}
{{--                <input required type="text" name="email" class="form-control" placeholder="Email">--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-xs-12 col-sm-12 col-md-12 text-center">--}}
{{--            <button type="submit" class="btn btn-primary">Verify</button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</form>--}}


{{--        @if ($student->email)--}}

{{--            {{$student->email}}--}}
{{--        @endif--}}

{{--            <img src="/images/img.jpeg">--}}

{{--                </div>--}}
{{--        </div>--}}

@endsection
