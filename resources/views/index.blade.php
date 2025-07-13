<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESCC - شركة المقاولات الهندسية</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href={{ asset('frontend/styles.css') }}>
</head>

<body>
    <!-- الشريط العلوي -->
    <header class="animate__fadeInCustom">
        <nav>
            <div class="logo animate__slideInLeft">
                <img src="{{ asset('frontend/logo DONE.png') }}" alt="">
                <span></span>
            </div>
            <ul class="nav-menu animate__slideInRight">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li><a href="#about">من نحن</a></li>
                <li><a href="#services">الخدمات</a></li>
                <li><a href="#products">المشاريع</a></li>
                <li><a href="#contact">اتصل بنا</a></li>

                @auth
                    {{-- ✅ زر تسجيل الخروج --}}
                    <li>
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf
                            <a href="{{ route('user.logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                تسجيل الخروج
                            </a>
                        </form>
                    </li>
                @else
                    {{-- ✅ روابط تسجيل الدخول والتسجيل --}}
                    <li>
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            تسجيل الدخول
                        </a>
                    </li>

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                إنشاء حساب
                            </a>
                        </li>
                    @endif
                @endauth

            </ul>
            <div class="menu-toggle animate__zoomIn">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>




@yield('content')
    <!-- التذييل -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section animate__fadeInCustom">
                    <h3>عن الشركة</h3>
                    <p>شركة SESCC للمقاولات الهندسية هي شركة رائدة في مجال الإنشاءات والتطوير العقاري.</p>
                </div>
                <div class="footer-section animate__fadeInCustom animate__delay-1s">
                    <h3>روابط سريعة</h3>
                    <ul>
                        <li><a href="#home">الرئيسية</a></li>
                        <li><a href="#about">من نحن</a></li>
                        <li><a href="#services">الخدمات</a></li>
                        <li><a href="#projects">المشاريع</a></li>
                        <li><a href="#contact">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="footer-section animate__fadeInCustom animate__delay-2s">
                    <h3>معلومات التواصل</h3>
                    <p>الرياض، المملكة العربية السعودية</p>
                    <li style="list-style-type: none;"><a href="https://wa.me/966531443917" target="_blank">+966531443917</a></li>
                    <p>info@sescc.sud</p>
                </div>
            </div>
            <div class="footer-bottom animate__fadeInCustom">
                <p>&copy; 2023 شركة SESCC للمقاولات الهندسية. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('frontend/script.js') }}"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</html>
