<x-front>

    <div class="banner" style="background:url({{ asset('front/images/backgrounds/page-heading-bg.jpg') }});">
        <div class="person-name">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="provider-img" style="position: relative !important; right: -52px;">
                            <img src="{{ asset($inventor->avatar ?? 'front/images/inventors/635652.jpg') }}"
                                alt="" style="height:200px; width:200px">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="caption">
                            <div class="inner">
                                <h1>{{ $inventor->name }}</h1>
                                <h5>{{ $inventor->dob->format('Y-m-d') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="portfolio-details" class="portfolio-details" style="direction:rtl;margin-top:3%;margin-bottom:3%;">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="portfolio-info" style="background:#ffffff;">

                        <p>
                        </p>
                    </div>


                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/?rel=0"
                            allowfullscreen=""></iframe>
                    </div>
                </div>


                <div class="col-lg-8">


                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#hostiry" aria-controls="hostiry" data-toggle="tab">سيرة
                                شخصية</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Congresses" aria-controls="Congresses"
                                data-toggle="tab">مؤتمرات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Research" aria-controls="Research" data-toggle="tab">مجموعات
                                البحث</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="hostiry">
                            <p>
                                it</p>
                        </div>

                        <div class="tab-pane" id="Congresses">
                            <p>
                                it</p>
                        </div>


                        <div class="tab-pane" id="Research">
                            <p>
                                it</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
