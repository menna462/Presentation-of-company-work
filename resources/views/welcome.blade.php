
@extends('index')

@section('content')
    <!-- الصفحة الرئيسية -->
    <section id="home">
        <div class="hero">
            <h1 class="animate__fadeInCustom">شركة SESCC للمقاولات الهندسية</h1>
            <p class="animate__fadeInCustom animate__delay-1s">نقدم حلولاً هندسية متكاملة بمعايير الجودة العالمية</p>
            <a href="#contact" class="btn animate__zoomIn">تواصل معنا</a>
        </div>
    </section>

@include('include.about')

@include('include.services')

@include('include.product')

@include('include.contact')


@endsection
