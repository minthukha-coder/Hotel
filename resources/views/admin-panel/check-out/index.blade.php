@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Check-Out Index</h3>
                            </div>


                        </div>
                    </div>


                    @if (session()->has('successMsg'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session()->get('successMsg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Room ID</th>
                                    <th>Check_In_Id</th>
                                    <th>Check_Out_Date</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($checkOuts as $checkOut)
                                    <tr>
                                        <td>{{ $checkOut->id }}</td>
                                        <td>{{ $checkOut->room_id }}</td>
                                        <td>{{ $checkOut->check_in_id }}</td>
                                        <td>{{ $checkOut->check_out_date }}</td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
