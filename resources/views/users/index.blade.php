@extends('layouts.app')


@section('content')

    <div style="margin: 50px"  class="">
        <div class="row" style="margin: 50px">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('eligibleStudents.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </div>
    @if(checkPermission(['Admin']))

        <div style="margin: 50px">
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-right">
                        <a target="_blank" class="btn btn-dark" href="{{ route('user.create') }}">New User</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered form-duration-div">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                                 @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    @endif


@endsection
