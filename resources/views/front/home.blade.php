<x-front>
    {{-- Featured Servives --}}
    @if (count($featuredServices))
        <section class="featured-services" id="featured-services">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    @foreach ($featuredServices as $featured)
                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                @if ($featured->icon)
                                    <div class="icon">
                                        <i class="{{ $featured->icon }}" aria-hidden="true"></i>
                                    </div>
                                @endif
                                <h4 class="title"><a href="">{{ $featured->title }}</a></h4>
                                <p class="description">{{ $featured->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    {{-- About Us --}}
    @if (setting('about_status') == 1)
        <section id="cta" class="cta">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 text-right text-lg-start">
                        <p>{{ setting('about') }}</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#cta">من نحن</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- How We Work --}}
    <section id="work" class="work aos-init aos-animate" data-aos="fade-up">
        <div class="container">
            <div class="title">
                <h2>كيف نعمل في المنصة</h2>
            </div>

            <div class="row content">
                <div class="col-md-12 aos-init aos-animate text-center" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('front/images/backgrounds/features-1.png') }}" class="img-fluid ms-0"
                        alt="">
                </div>
            </div>

        </div>
    </section>
</x-front>
