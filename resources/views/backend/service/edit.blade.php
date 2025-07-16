@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('service.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="old_id" value="{{ $result->id }}">

                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $result->title) }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Paragraph</label>
                    <textarea class="form-control" name="paragraph">{{ old('paragraph', $result->paragraph) }}</textarea>
                    @error('paragraph')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Image</label>
                    <input type="file" class="form-control" name="image">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    @if ($result->image)
                        {{-- تأكد من استخدام $result->image --}}
                        <div class="mt-3">
                            <p>Current Image:</p>
                            {{-- المسار هنا صحيح لأن $result->image يحتوي على المسار الكامل من مجلد public --}}
                            <img src="{{ asset($result->image) }}" width="200" alt="Service Image">
                        </div>
                    @endif

                    <input type="submit" class="btn btn-success btn-block mt-4" value="Update Service">
                </form>
            </div>
        </div>
    </div>
@endsection
