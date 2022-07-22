@extends('layouts.app')


@section('content')
    <div style="margin: 50px"  class="">


            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">

                @php
                    $i = 1
                @endphp
                @foreach (($eligibleStudents) as $eligibleStudent)

                    @if (strtoupper(trim($eligibleStudent->email)) === strtoupper(trim($stdEmail)))
                        @php
                            $i = 2
                        @endphp

                    @endif
                @endforeach

                {{--            1--}}

                @foreach ($studentRegistrations as $studentRegistration)
                    @if (strtoupper(trim($studentRegistration->email)) === strtoupper(trim($stdEmail)))
                        @php
                            $i = 3
                        @endphp
                        <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                            @if($studentRegistration->status==='Pending')
                                <div class="pull-left">
                                    <h2 style="color: #00ffe1; font-weight: bold">Your Registration is Pending</h2>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="pull-right">
                                            <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="pull-right">
                                            <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($studentRegistration->status==='Reject')
                                <div class="pull-left">
                                    <h2 style="color: #ff5900; font-weight: bold">Your Registration is Rejected</h2>
                                    <p style="color:red;">{{$studentRegistration->statusMessage}}}</p>
                                </div>

                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="pull-right">
                                            <a class="btn btn-info" href="{{ route('studentRegistration.edit',$studentRegistration->id) }}">Edit Your Registration</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2">
                                        <div class="pull-right">
                                            <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($studentRegistration->status==='Accept')
                                <div class="pull-left">
                                    <h2 style="color: #0048ff; font-weight: bold">Your are already Registered</h2>
                                </div>

                            @endif

                        </div>
                    @endif
                @endforeach


                @if ($i===1)
                    <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                        <div class="pull-left">
                            <h2 style="color: #ff0000; font-weight: bold">Sorry! You are Not Eligible For Convocation</h2>
                        </div>
                    </div>
                @endif


                @if ($i===2)
                    <div class="col-lg-12 margin-tb" style="margin-bottom:30px;">
                        <div class="pull-left">
                            <h2 style="color: #00a95a; font-weight: bold">Congratulation! You are Eligible  For Convocation</h2>
{{--                            <h2 style="color: #00a95a; font-weight: bold">{{$stdEmail}}</h2>--}}
                        </div>
                        <div class="row">
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('studentRegistration.create') }}">Register Now</a>
                                </div>
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2">
                                <div class="pull-right">
                                    <a class="btn btn-dark" target="_blank" href="{{ url('https://www.sab.ac.lk/payment-boc/') }}">Payment</a>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif








    </div>










@endsection
