@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('contact.update') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="old_id" value="{{ $result->id }}">

                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $result->phone) }}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $result->email) }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Address</label>
                    <textarea class="form-control" name="address">{{ old('address', $result->address) }}</textarea>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Location</label>
                    <input type="text" class="form-control" name="location_map" value="{{ old('location_map', $result->location_map) }}">
                    @error('location')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="submit" class="btn btn-success btn-block mt-4" value="Update Contact">
                </form>
            </div>
        </div>
    </div>
@endsection
