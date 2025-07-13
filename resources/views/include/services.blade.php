<!-- قسم الخدمات -->
<section id="services" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold text-primary">خدماتنا</h2>

        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-200  shadow border-0 service-card text-center">
                        <img src="{{ asset($service->image) }}" class="card-img-top img-fluid" alt="{{ $service->title }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $service->title }}</h5>
                            <p class="card-text text-muted">{{ $service->paragraph }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('allServices') }}" class="btn btn-primary btn-lg rounded-pill px-5">
                عرض المزيد من الخدمات
            </a>
        </div>
    </div>
</section>
