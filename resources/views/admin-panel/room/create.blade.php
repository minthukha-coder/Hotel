@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Room Create</h3>
                    </div>

                    @if (session()->has('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('successMsg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('rooms.store') }}" method = "post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name = "name"
                                    class="form-control
                                    @error('name') is-invalid @enderror">

                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Select Option</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name = "price">

                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 1</label>
                                <input type="file" name = "image_1"
                                    class="form-control @error('image_1') is-invalid @enderror">
                                @error('image_1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 2</label>
                                <input type="file" name = "image_2"
                                    class="form-control @error('image_2') is-invalid @enderror">
                                @error('image_2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 3</label>
                                <input type="file" name = "image_3"
                                    class="form-control @error('image_3') is-invalid @enderror">
                                @error('image_3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Image 4</label>
                                <input type="file" name = "image_4"
                                    class="form-control @error('image_4') is-invalid @enderror">
                                @error('image_4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
