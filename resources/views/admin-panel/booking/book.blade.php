@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Booking</h3>
                            </div>

                            {{-- <div class="col-md-6">
                                <a href=" {{ route('rooms.create') }}" class="btn btn-primary btn-sm float-end"><i
                                        class="bi bi-plus-circle"></i>
                                    Create</a>
                            </div> --}}
                        </div>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Room</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Duration</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->room->name }}</td>
                                        <td>{{ $booking->check_in_date }}</td>
                                        <td>{{ $booking->check_out_date }}</td>
                                        <td>{{ $booking->duration }}</td>
                                        <td>{{ $booking->total_amount }}</td>
                                        <td>

                                            <form action = "" method = "post">
                                                @csrf
                                                <button class="btn btn-primary btn-sm">Confirm</button>
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
