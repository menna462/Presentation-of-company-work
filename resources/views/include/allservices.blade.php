@extends('index')

@section('content')

<section id="all-services">
    <div class="container">
        <h2>جميع الخدمات</h2>
        <div class="services-grid">
            @foreach ($services as $service)
                <div class="service-card">
                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}">
                    <h3>{{ $service->title }}</h3>
                    <p>{{ $service->paragraph }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection

