<style>
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 16px;
        text-align: center;
        transition: box-shadow 0.3s ease;
        background-color: #fff;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        max-width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 12px;
    }

    .product-card h3 {
        font-size: 1.2rem;
        margin: 8px 0;
    }

    .product-card p {
        color: #555;
        font-size: 0.95rem;
        margin-bottom: 12px;
    }

    .product-card .btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .product-card .btn:hover {
        background-color: #0056b3;
    }
</style>

<section id="products">
    <div class="container">
        <h2>مشاريعنا</h2>
        <div class="products-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    {{-- صورة واحدة فقط (الأولى) --}}
                    @if ($product->images->first())
                        <img src="{{ asset('imges/products/' . $product->images->first()->image_path) }}" alt="صورة المنتج">
                    @else
                        <img src="{{ asset('imges/products/default.png') }}" alt="صورة افتراضية">
                    @endif

                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <a href="{{ route('productshow', $product->id) }}" class="btn">عرض التفاصيل</a>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('allProducts') }}" class="btn btn-primary">عرض كل المشاريع</a>
        </div>
    </div>
</section>

