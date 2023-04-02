<x-front>
    <x-breadcrumb :title="$event->title" />

    <section id="course-details" class="course-details">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12">
                    <img src="{{ asset($event->image) }}" class="img_event_details" alt="">
                    <h3>{{ $event->title }}</h3>
                    <h6><i class="fa fa-calendar"></i>&nbsp; {{ $event->date->format('Y-m-d') }} {{ $event->time }}
                    </h6>
                    <div class="news_details">
                        <p>{{ $event->description }}</p>
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
