<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <a href="#">{{ date('Y-m-d') }}</a>
            <span class="TopBorder"> | </span>
            <i class="fa fa-clock-o"></i>
            <a href="#">
                {{ date('H:i') }} {{ get_time(date('H')) }}
            </a>

            <span class="TopPhone">
                <span class="TopBorder"> |</span>
                <i class="fa fa-phone"></i>
                {{ setting('phone') }}
            </span>
        </div>
        <div class="social-links d-none d-md-block">

            {{-- Social Media Buttons --}}
            @foreach (['facebook', 'twitter', 'youtube', 'instagrame', 'whatsapp'] as $media)
                @if ($link = setting($media))
                    <a href="{{ $link }}" class="twitter" target="_blank"><i
                            class="fab fa-{{ $media }}"></i></a>
                @endif
            @endforeach

            <a href="#" class="">|</a>
            @auth
                <div class="d-inline-block">
                    <x-dashboard.logout class="sign-in"><i class="fa fa-sign-out text-danger"></i></x-dashboard.logout>
                </div>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="sign-in"><i class="fa fa-sign-in"></i></a>
            @endguest
        </div>
    </div>
</section>
<header>
    <div class="header-inner" style="background-image: url({{ asset('front/images/backgrounds/bg-1.jpg') }})">

        <section class="layout-width clearfix">

            <div class="site-title fixed">
                <div class="site-logo">
                    <h3>
                        <a href="{{ route('home') }}" title="estesnee">
                            <img src="{{ asset(setting('logo')) }}" alt="estesnee"></a>
                    </h3>
                </div>
                <div class="top-contact">منصة عربية للنهوض بصناعة الاختراعات</div>
            </div>
            {{--  Menu --}}
            @include('layouts.front.menu')
        </section>


        {{-- Slider --}}
        @if (request()->routeIs('home'))
            <div id="slider-wrap" dir="ltr">
                <section id="hero">
                    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade"
                        data-bs-ride="carousel">
                        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                        <div class="carousel-inner" role="listbox">
                            @foreach ($sliders as $index => $item)
                                <!-- Slide 1 -->
                                <div @class(['carousel-item', 'active' => $index == 0])
                                    style="background-image: url({{ asset($item->image) }})">

                                    <div class="container">
                                        <h2>{{ $item->title }}</h2>
                                        <p>{{ $item->description }}</p>
                                        <a href="#about" class="btn-get-started scrollto">تفاصيل اكثر</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                        </a>

                        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                        </a>

                    </div>
                </section><!-- End Hero -->
            </div>
        @endif

    </div>

</header>
@php
    function get_time($g_hours)
    {
        switch ($g_hours) {
            case '00':
                $IsTime = 'بعد منتصف الليل';
                break;
            case '01':
                $IsTime = 'بعد منتصف الليل';
                break;
            case '02':
                $IsTime = 'بعد منتصف الليل';
                break;
            case '03':
                $IsTime = 'فجراً';
                break;
            case '04':
                $IsTime = 'فجراً';
                break;
            case '05':
                $IsTime = 'فجراً';
                break;
            case '06':
                $IsTime = 'صباحاً';
                break;
            case '07':
                $IsTime = 'صباحاً';
                break;
            case '08':
                $IsTime = 'صباحاً';
                break;
            case '09':
                $IsTime = 'صباحاً';
                break;
            case '10':
                $IsTime = 'صباحاً';
                break;
            case '11':
                $IsTime = 'ظهراً';
                break;
            case '12':
                $IsTime = 'ظهراً';
                break;
            case '13':
                $IsTime = 'ظهراً';
                break;
            case '14':
                $IsTime = 'ظهراً';
                break;
            case '15':
                $IsTime = 'عصراً';
                break;
            case '16':
                $IsTime = 'عصراً';
                break;
            case '17':
                $IsTime = 'قبل المغرب';
                break;
            case '18':
                $IsTime = 'مغرب';
                break;
            case '19':
                $IsTime = 'ليلاً';
                break;
            case '20':
                $IsTime = 'ليلاً';
                break;
            case '21':
                $IsTime = 'ليلاً';
                break;
            case '22':
                $IsTime = 'ليلاً';
                break;
            case '23':
                $IsTime = 'ليلاً';
                break;
            case '24':
                $IsTime = 'ليلاً';
                break;
        }
        return $IsTime;
    }
@endphp
