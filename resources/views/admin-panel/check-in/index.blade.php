@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>CheckIn Index</h3>
                            </div>
                            {{-- 
                            <div class="col-md-6">
                                <a href=" {{ route('rooms.create') }}" class="btn btn-primary btn-sm float-end"><i
                                        class="bi bi-plus-circle"></i>
                                    Create</a>
                            </div> --}}
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
                                    <th>Booking</th>
                                    <th>Check In Date</th>
                                    <th>Staff</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($checkIns as $checkIn)
                                    <tr>
                                        <td>{{ $checkIn->id }}</td>
                                        <td>{{ $checkIn->room_id }}</td>
                                        <td>{{ $checkIn->booking_id }}</td>
                                        <td>{{ $checkIn->check_in_date }}</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>
                                            <form action="{{ route('check-out', $checkIn->id) }}" method = "post">
                                                @csrf
                                                <button class="btn btn-success">CheckOut</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
