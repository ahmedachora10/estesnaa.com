<div id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <a href="#">{{ date('Y-m-d') }}</a>
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span class="TopBorder"> | </span>
            <a href="#" dir="rtl">
                {{ date('H:i') }} {{ get_time(date('H')) }}
            </a>
            <i class="fa fa-clock-o"></i>

            <span class="TopPhone">
                <span class="TopBorder"> |</span>
                {{ setting('phone') }}
                <i class="fa fa-phone"></i>
            </span>
        </div>
        <div class="social-links d-none d-md-block">

            {{-- Social Media Buttons --}}
            @foreach (['facebook', 'twitter', 'youtube', 'instagram', 'linkedin', 'whatsapp'] as $media)
                @if ($link = setting($media))
                    <a href="{{ $link }}" class="twitter" target="_blank"><i
                            class="fab fa-{{ $media }}"></i></a>
                @endif
            @endforeach

            <a href="#" class="">|</a>
            @auth
                {{-- User Dropdown Menu --}}
                <div class="d-inline-block position-relative" dir="rtl">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset(auth()->user()->image) }}" alt="user avatar"
                            class="rounded-circle position-relative" style="top:3px" id="user-menu-btn" width="20"
                            height="20">
                        <span class="arrow icon-keyboard_arrow_down"></span>
                    </a>

                    <div class="bg-white px-3 py-4 position-absolute" id="user-menu" style="display: none">
                        <ul class="list-unstyled">
                            @if (auth()->user()->role != 'user')
                                <li class="py-3 border-bottom">
                                    <a href="{{ route('dashboard') }}" class="text-dark fw-normal" style="font-size: 13px">
                                        <i class="fas fa-dashboard text-secondary"></i> لوحة التحكم
                                    </a>
                                </li>

                                <li class="py-3 border-bottom">
                                    <a href="{{ route('users.show', auth()->user()) }}" class="text-dark fw-normal"
                                        style="font-size: 13px">
                                        <i class="fas fa-user text-secondary"></i> الملف الشخصي
                                    </a>
                                </li>
                            @else
                                <li class="py-3 border-bottom">
                                    <a href="{{ route('front.user.purchase') }}" class="text-dark fw-normal"
                                        style="font-size: 13px">
                                        <i class="fas fa-cart-shopping text-secondary"></i> مشترياتي
                                    </a>
                                </li>
                            @endif

                            @if (in_array(auth()->user()->role, ['user', 'service_provider', 'inventor']))
                                <li class="py-3 border-bottom">
                                    @php
                                        $messages_counter = auth()->user()->messages_count;
                                    @endphp
                                    <a href="#" @class([
                                        'fw-normal',
                                        'text-danger' => $messages_counter > 0,
                                        'text-dark' => $messages_counter < 1,
                                    ]) style="font-size: 13px" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#chats" aria-controls="chats">
                                        <i @class([
                                            'fas fa-message',
                                            'text-danger' => $messages_counter > 0,
                                            'text-secondary' => $messages_counter < 1,
                                        ])></i> الرسائل
                                        @if ($messages_counter > 0)
                                            ({{ $messages_counter }})
                                        @endif
                                    </a>
                                </li>
                            @endif


                            <li class="pt-3">
                                <x-dashboard.logout class="sign-in text-danger fw-bold" style="font-size:13px"><i
                                        class="fa fa-sign-out text-danger"></i> الخروج
                                </x-dashboard.logout>
                            </li>
                        </ul>
                    </div>

                    {{-- <x-dashboard.logout class="sign-in"><i class="fa fa-sign-out text-danger"></i></x-dashboard.logout> --}}
                </div>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="sign-in"><i class="fa fa-sign-in"></i></a>
            @endguest
        </div>
    </div>
</div>
<header>
    <div class="header-inner" style="background-image: url({{ asset('front/images/backgrounds/bg-1.jpg') }})">
        <section class="layout-width container clearfix">

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
                                        <h2 style="font-size:20px !important">{{ $item->title }}</h2>
                                        <p class="fs-5 fw-bold text-start" style="color: #eabe00">
                                            {{ $item->description }}</p>
                                        {{-- <a href="#about" class="btn-get-started scrollto">تفاصيل اكثر</a> --}}
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
