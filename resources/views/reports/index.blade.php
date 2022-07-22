



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
        <table  class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Report Status</th>
                <th>Action</th>

            </tr>
            @php
                $a = 0
            @endphp
            @foreach ($reports as $report)
                <tr>
                    <td>{{ ++$a }}</td>
                    <td>{{ $report->email }}</td>
                    <td>{{ $report->reportStatus }}</td>

                    <td>
                                        <a class="btn btn-info" href="{{ route('report.show',$report->id) }}">Show</a>
                    </td>

                </tr>
            @endforeach
        </table>

    </div>








@endsection
