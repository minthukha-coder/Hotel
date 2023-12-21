@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Room Edit</h3>
                    </div>

                    @if (session()->has('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('successMsg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('rooms.update', $roomEdit->id) }}" method = "post"
                            enctype="multipart/form-data">
                            @csrf @method('put')
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name = "name"
                                    class="form-control
                                    @error('name') is-invalid @enderror"
                                    value = "{{ old('name') ?? $roomEdit->name }}">

                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Select Option</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $roomEdit->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name = "price" value = "{{ old('price') ?? $roomEdit->price }}">

                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 1</label>
                                <input type="file" name = "image_1"
                                    class="form-control @error('image_1') is-invalid @enderror">

                                <img src="{{ asset('storage/room-images/' . $roomEdit->image_1) }}" alt=""
                                    style = "width:150px;" class="mt-3">
                                @error('image_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 2</label>
                                <input type="file" name = "image_2"
                                    class="form-control @error('image_2') is-invalid @enderror">

                                <img src="{{ asset('storage/room-images/' . $roomEdit->image_2) }}" alt=""
                                    style = "width:150px;" class="mt-3">

                                @error('image_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 3</label>
                                <input type="file" name = "image_3"
                                    class="form-control @error('image_3') is-invalid @enderror">

                                <img src="{{ asset('storage/room-images/' . $roomEdit->image_3) }}" alt=""
                                    style = "width:150px;margin:20px 0;">

                                @error('image_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 4</label>
                                <input type="file" name = "image_4"
                                    class="form-control @error('image_4') is-invalid @enderror">

                                <img src="{{ asset('storage/room-images/' . $roomEdit->image_4) }}" alt=""
                                    style = "width:150px;margin:20px 0;">

                                @error('image_4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
