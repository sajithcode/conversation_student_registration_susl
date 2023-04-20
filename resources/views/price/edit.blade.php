@extends('layouts.app')


@section('content')
    @if(checkPermission([ 'Admin' ]))
        <div style="margin: 50px"  class="">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered form-duration-div">
                <tr>

                    @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
                        <th>No</th>
                        <th>Presence</th>
                        <th >Absence</th>
                    @endif

                </tr>
                @php
                    $a = 0
                @endphp
                @foreach ($prices as $price)
                    <tr>

                        @if(checkPermission(['Admin','viceChancellor','EBSC_Applied','EBSC_Geo','EBSC_Social','EBSC_Mana','EBSC_Med','EBSC_Agri','EBSC_Tech','EBSC_GS']))
                            <td>{{ ++$a }}</td>
                            {{--                        <td>{{ $convocation->convocation }}</td>--}}



                            <form action="{{ route('price.update',$price->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <td>
                                    <input value={{ $price->presence }} required type="text" name="presence" class="form-control" />
                                </td>
                                <td>
                                    <input value={{ $price->absence }} required type="text" name="absence" class="form-control" />
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
