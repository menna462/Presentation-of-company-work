@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action={{ route('imgproduct.store') }} method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="">ID</label>
                    <input type="hidden" class="form-control" name="id">
                    @error('id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="">Img</label>
                    <input type="file" name="images[]" multiple class="form-control">
                    @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="">Product</label>
                    <select name="product_id" class="form-control">
                        <option value="">اختار منتج</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option> <!-- عرض اسم المنتج -->
                        @endforeach
                    </select>


                    <input type="submit" class="btn btn-success btn-block mt-5" value="Create New img">
                </form>

            </div>
        </div>
    </div>
@endsection
