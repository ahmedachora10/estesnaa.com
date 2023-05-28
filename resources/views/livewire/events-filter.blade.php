<section id="events" class="events">
    <div class="container">
        @auth
            @if (in_array(auth()->user()->role, ['inventor', 'event']))
                <div class="mb-3 d-flex justify-content-end">
                    <a href="{{ route('events.create') }}" class="btn custom-main-bg-color text-white"
                        style="width:200px">اضافة
                        فعالية
                        جديدة</a>
                </div>
            @endif
        @endauth
        <div class="row">
            <div class="col-md-4 bd-sidebar">
                <div class="sidebar">
                    <h3 class="sidebar-title">بحث</h3>
                    <div class="sidebar-item search-form">
                        <form action="" dir="ltr">
                            <input type="text" wire:model.defer="search">
                            <button type="button" wire:click="filter"><i class="bi bi-search"></i></button>
                        </form>
                    </div><!-- End sidebar search formn-->

                    <h3 class="sidebar-title">التصنيف</h3>
                    <div class="sidebar-item categories">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="#!"
                                        wire:click="selectCategory({{ $category->id }})">{{ $category->name }}<span>
                                            ({{ $category->events_count }})
                                        </span></a></li>
                            @endforeach
                        </ul>
                    </div><!-- End sidebar categories-->

                    <hr>
                    <div id="skills" class="skills">
                        <div class=" aos-init aos-animate" data-aos="fade-up">

                            <div class="row skills-content">
                                <div class="col-lg-12">
                                    @foreach ($usersEeventsStatistics as $user)
                                        @php
                                            $statistics = ($user->events_count * 100) / count($events);
                                        @endphp
                                        <div class="progress">
                                            <span class="skill">{{ $user->name }}<i
                                                    class="val">{{ $user->events_count }}</i></span>
                                            <div class="progress-bar-wrap">
                                                <div class="progress-bar" role="progressbar"
                                                    aria-valuenow="{{ $statistics }}" aria-valuemin="0"
                                                    aria-valuemax="100" style="width: {{ $statistics }}%">
                                                    {{ $statistics }}%</div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End sidebar tags-->

                </div>
            </div>

            <main class="col-md-8 bd-content" role="main">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{ asset($event->image) }}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title"><a
                                            href="{{ route('front.events.show', $event) }}">{{ $event->title }}</a>
                                    </h3>
                                    <h6><i class="fa fa-calendar"
                                            aria-hidden="true"></i>{{ $event->date->format('Y-m-d') }}
                                        {{ $event->time }}</h6>
                                    <h5><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $event->address }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>
</section>

@push('styles')
    <style>
        .events .card-img img {
            width: 300px !important;
            height: 236px !important;
        }
    </style>
@endpush
