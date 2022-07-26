<td>{{ $report->regNum }}</td>
<td>{{ $report->email }}</td>
<td>{{ $report->faculty }}</td>
<td>{{ $report->reportStatus }}</td>



<td>
    <a class="btn btn-info" href="{{ route('report.show',$report->id) }}">Show</a>
</td>
