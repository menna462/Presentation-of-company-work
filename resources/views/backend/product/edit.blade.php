@extends('backend.dashboard')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <h2 class="text-center mb-4">تعديل المنتج</h2>

            <form action="{{ route('product.update') }}" method="post">
                @csrf

                <input type="hidden" name="old_id" value="{{ $product->id }}">

                <!-- اسم المنتج -->
                <div class="form-group mb-3">
                    <label for="name">اسم المنتج</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- وصف المنتج -->
                <div class="form-group mb-3">
                    <label for="description">وصف المنتج</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- الفئة -->
                <div class="form-group mb-3">
                    <label for="category_id">الفئة</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">اختر الفئة</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- زر التحديث -->
                <button type="submit" class="btn btn-success w-100">تحديث المنتج</button>
            </form>
        </div>
    </div>
</div>
@endsection
