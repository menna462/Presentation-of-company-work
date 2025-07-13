@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf

                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Address</label>
                    <textarea class="form-control" name="address">{{ old('address') }}</textarea>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Location Map (iframe or link)</label>
                    <textarea class="form-control" name="location_map">{{ old('location_map') }}</textarea>
                    @error('location_map')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="submit" class="btn btn-success btn-block mt-5" value="Create New Contact">
                </form>
            </div>
        </div>
    </div>
@endsection

