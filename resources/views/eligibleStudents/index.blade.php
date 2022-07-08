@extends('layouts.app')


@section('content')
    <div style="margin: 50px"  class="">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Eligible Student List</h2>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('eligibleStudents.create') }}">Add a new student</a>
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('eligibleStudents.create') }}">Add a new student</a>
                </div>
                </div>
            </div>
    </div>

    <div style="margin: 50px">
        <table class="table table-bordered">
            <tr>
                {{--            <th>No</th>--}}
                <th>Name</th>
                <th>Register Number</th>
                <th>Index Number</th>
                <th>Faculty</th>
                <th>Department</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($eligibleStudents as $eligibleStudent)
                <tr>
                    {{--                <td>{{ ++$i }}</td>--}}
                    <td>{{ $eligibleStudent->nameWithInitials }}</td>
                    <td>{{ $eligibleStudent->regNum }}</td>
                    <td>{{ $eligibleStudent->indexNum }}</td>
                    <td>{{ $eligibleStudent->faculty }}</td>
                    <td>{{ $eligibleStudent->department }}</td>
                    <td>
                        <form action="{{ route('eligibleStudents.destroy',$eligibleStudent->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('eligibleStudents.show',$eligibleStudent->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('eligibleStudents.edit',$eligibleStudent->id) }}">Edit</a>


                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>








@endsection
