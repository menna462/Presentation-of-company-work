@extends('index')

@section('content')
    <style>
        #all-products {
            padding: 40px 0;
            background-color: #f8f9fa;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
            color: #333;
        }

        /* أزرار التصفية */
        .filter-buttons {
            text-align: center;
            margin-bottom: 30px;
        }

        .filter-btn {
            padding: 10px 20px;
            margin: 5px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .filter-btn.active,
        .filter-btn:hover {
            background-color: #0056b3;
        }

        /* شبكة المنتجات */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        /* كارت المنتج */
        .product-card {
            background-color: #fff;
            border-radius: 8px;
            padding: 16px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s;
        }

        .product-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        .product-card img {
            max-width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 12px;
        }

        .product-card h3 {
            font-size: 1.2rem;
            margin: 8px 0;
            color: #333;
        }

        .product-card p {
            font-size: 0.95rem;
            color: #555;
            margin-bottom: 8px;
        }

        .category-name {
            display: inline-block;
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 12px;
        }

        .product-card .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .product-card .btn:hover {
            background-color: #0056b3;
        }
    </style>

    <section id="all-products mt-10">
        <div class="container">
            <h2 class="section-title">كل المنتجات</h2>

            <!-- أزرار التصفية -->
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">الكل</button>
                @foreach ($categories as $category)
                    <button class="filter-btn" data-filter="category-{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>

            <!-- المنتجات -->
            <div class="products-grid">
                @foreach ($products as $product)
                    <div class="product-card filter-item category-{{ $product->category_id }}">
                        @if ($product->images->count())
                            <img src="{{ asset('imges/products/' . $product->images->first()->image_path) }}"
                                alt="{{ $product->title }}">
                        @else
                            <img src="https://via.placeholder.com/300x200?text=No+Image" alt="{{ $product->name }}">
                        @endif
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <span class="category-name">{{ $product->category->name }}</span>
                        <div> <a href="{{ route('productshow', $product->id) }}" class="btn">عرض التفاصيل</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('.filter-item');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');

                // شيل active من كل الزراير
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // فلترة العناصر
                items.forEach(item => {
                    if (filter === 'all' || item.classList.contains(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

@endsection
