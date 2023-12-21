@extends('admin-panel.layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Category Index</h3>
                    </div>

                    @if (session()->has('successMsg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('successMsg') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form
                            action="{{ isset($categoryEdit) ? route('categories.update', $categoryEdit->id) : route('categories.store') }}"
                            method = "post">
                            @csrf
                            @if (isset($categoryEdit))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name = "name"
                                    class="form-control
                                    @error('name') is-invalid @enderror"
                                    value = "{{ old('name') ?? isset($categoryEdit) ? $categoryEdit->name : '' }}">

                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button class="btn btn-primary">
                                {{ isset($categoryEdit) ? 'Update' : 'Submit' }}
                            </button>
                        </form>
                    </div>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <form action="{{ route('categories.delete', $category->id) }}" method = "post">
                                            @csrf @method('delete')
                                            <a href="{{ route('categories.index', ['edit' => $category->id]) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
