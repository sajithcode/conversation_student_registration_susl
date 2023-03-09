@extends('layouts.app')


@section('content')
    @if(checkPermission([ 'Admin' ]))
    <div style="margin: 50px"  class="">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <div class="row" style="margin-bottom: 10px">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="pull-right">
                        <a target="_blank" class="btn btn-dark" href="{{ route('convocation.create') }}">Add a new Convocation</a>
                    </div>
                </div>
            </div>
        <table class="table table-bordered form-duration-div">
            <tr>

                @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
                    <th>No</th>
                    <th>Convocation</th>
                    <th>Status</th>
                    <th >Action</th>
                @endif

            </tr>
            @php
                $a = 0
            @endphp
            @foreach ($convocations as $convocation)
                <tr>

                    @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
                        <td>{{ ++$a }}</td>
                        <td>{{ $convocation->convocation }}</td>



                        <form action="{{ route('convocation.update',$convocation->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <td>

                                <select required name="status" class="custom-select" id="inputGroupSelect01" >
                                    <option selected>{{ $convocation->status }}</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>

                                </select>
                            </td>


                            <td>
                                <button type="submit" class="btn btn-danger">Update</button>
                            </td>
                        </form>
                    @endif



                </tr>
            @endforeach
        </table>

    </div>



@endif
@endsection
