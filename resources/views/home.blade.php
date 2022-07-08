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
            </div>
        </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('eligible_students.create') }}">Add a new student</a>
            </div>
    </div>

    <table class="table table-bordered">
        <tr>
{{--            <th>No</th>--}}
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($eligibleStudents as $eligibleStudent)
            <tr>
{{--                <td>{{ ++$i }}</td>--}}
                <td>{{ $eligibleStudent->nameWithInitials }}</td>
                <td>{{ $eligibleStudent->regNum }}</td>
                <td>
                    <form action="{{ route('eligible_students.destroy',$eligibleStudent->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('eligible_students.show',$eligibleStudent->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('eligible_students.edit',$eligibleStudent->id) }}">Edit</a>

                        {{--                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Detail set as Null</a>--}}

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>







@endsection
