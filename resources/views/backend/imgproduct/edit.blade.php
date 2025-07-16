@extends('backend.dashboard')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto">
                <form action={{ route('imgproduct.update') }} method="post" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="old_id" value={{ $result->id }}>
                    <label for="">Img</label>
                    <input type="file" name="image_path" class="form-control">
                    <!-- عرض الصورة الحالية -->
                    @if ($result->image_path)
                        @php
                            $ext = pathinfo($result->image_path, PATHINFO_EXTENSION);
                        @endphp
                        <div class="mt-3 mb-3">
                            <label>الملف الحالي:</label>
                            <br>
                            @if (in_array(strtolower($ext), ['mp4', 'webm', 'ogg']))
                                <video width="250" height="150" controls style="border:1px solid #ccc; padding:5px;">
                                    <source src="{{ asset('imges/products/' . $item->image_path) }}"
                                        type="video/{{ $ext }}">
                                    المتصفح لا يدعم عرض الفيديو.
                                </video>
                            @else
                                <img src="{{ asset('imges/products/' . $item->image_path) }}" width="150"
                                    alt="Current Media" style="border:1px solid #ccc; padding:5px;">
                            @endif
                        </div>
                    @endif


                    @error('images')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <!-- حقل اختيار المنتج -->
                    <label for="">Product</label>
                    <select name="product_id" class="form-control">
                        <option value="">اختار منتج</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $result->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>

                    @error('product_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="submit" class="btn btn-success btn-block mt-5" value="Edit imgProduct">
                </form>
            </div>
        </div>
    </div>
@endsection
