@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Paragraph</label>
                    <textarea class="form-control" name="paragraph">{{ old('paragraph') }}</textarea>
                    @error('paragraph')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="submit" class="btn btn-success btn-block mt-5" value="Create New Service">
                </form>
            </div>
        </div>
    </div>
@endsection
