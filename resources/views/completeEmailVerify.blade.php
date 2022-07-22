@extends('layouts.app')

@section('content')

    <form  method="PUT" action="{{ route('completeEmailVerification') }}">
        @csrf
        @method('PUT')

        <div style="margin: 60px" class="row">
            <?php
            session_start();
            //            $id = 10;
            //            $_SESSION["user_id"] = $id;
            //
            //                           session_start();
//            echo $_SESSION["user_id"];
//            echo $_SESSION["email"];
            $email = $_SESSION["email"];

            //            session_destroy();
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input style="display: none" readonly value={{$email}} required type="text" name="email" class="form-control" placeholder="Email">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Click Here To Complete Email Verification</button>
            </div>

        </div>

    </form>

@endsection
