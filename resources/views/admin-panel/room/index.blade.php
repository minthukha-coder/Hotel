@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Room Index</h3>
                            </div>

                            <div class="col-md-6">
                                <a href=" {{ route('rooms.create') }}" class="btn btn-primary btn-sm float-end"><i
                                        class="bi bi-plus-circle"></i>
                                    Create</a>
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
                                    <th colspan="1" class="text-center">Images</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($rooms as $index => $room)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td style="text-align: center;">

                                            <img src="{{ asset('storage/room-images/' . $room->image_1) }}" alt=""
                                                style="width: 150px; display: block; margin: 0 auto;">

                                            <div style="display: flex; justify-content: space-between; margin-top: 5px;">

                                                <img src="{{ asset('storage/room-images/' . $room->image_2) }}"
                                                    alt="" style="width: 80px;height:60px;object-fit:cover;">

                                                <img src="{{ asset('storage/room-images/' . $room->image_3) }}"
                                                    alt="" style="width: 80px;height:60px;object-fit:cover;">

                                                <img src="{{ asset('storage/room-images/' . $room->image_4) }}"
                                                    alt="" style="width: 80px;height:60px;object-fit:cover;">

                                            </div>

                                        </td>
                                        <td>{{ $room->name }}</td>
                                        <td>{{ $room->category->name }}</td>
                                        <td>{{ $room->status }}</td>
                                        <td>{{ $room->price }}</td>


                                        <td>
                                            <form action="{{ route('rooms.destroy', $room->id) }}" method = "post">
                                                @csrf @method('delete')
                                                <a href="{{ route('rooms.edit', $room->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm">Delete</button>
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
