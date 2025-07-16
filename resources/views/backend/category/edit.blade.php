@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('category.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="old_id" value="{{ $result->id }}">

                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $result->name) }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <input type="submit" class="btn btn-success btn-block mt-4" value="Update Category">
                </form>
            </div>
        </div>
    </div>
@endsection
