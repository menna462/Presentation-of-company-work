@extends('index')

@section('content')

<section id="product-detail mt-10">
    <div class="container">
        <div class="product-card">
            <div class="product-detail-grid">
                <!-- تفاصيل المنتج -->
                <div class="product-info m-auto">
                    <h2>{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                </div>

                <!-- صور المنتج -->
                <div class="product-images">
                    @if ($product->images->count())
                        <div class="main-image">
                            <img id="mainImage" src="{{ asset('imges/products/' . $product->images->first()->image_path) }}" alt="">
                        </div>
                        <div class="thumbnails">
                            @foreach ($product->images as $img)
                                <img src="{{ asset('imges/products/' . $img->image_path) }}" alt="" onclick="document.getElementById('mainImage').src=this.src;">
                            @endforeach
                        </div>
                    @else
                        <p>لا توجد صور متاحة لهذا المنتج.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
#product-detail {
    padding: 40px 0;
    background-color: #f8f9fa;
}

.product-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.1);
    padding: 20px;
    max-width: 1000px;
    margin: auto;
}

.product-detail-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    align-items: flex-start;
}

.product-info {
    flex: 1 1 45%;
    text-align: right;
}

.product-info h2 {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #333;
}

.product-info p {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
}

.product-images {
    flex: 1 1 45%;
}

.main-image img {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 8px;
}

.thumbnails {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 15px;
    justify-content: flex-start;
}

.thumbnails img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid #ddd;
    border-radius: 4px;
    transition: border-color 0.3s;
}

.thumbnails img:hover {
    border-color: #007bff;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .product-detail-grid {
        flex-direction: column;
        text-align: center;
    }

    .product-info {
        text-align: center;
    }

    .thumbnails {
        justify-content: center;
    }
}
</style>

@endsection
