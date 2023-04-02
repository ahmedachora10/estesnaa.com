<section id="events" class="events">
    <div class="container">

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
                                <li><a href="#">{{ $category->name }}<span> ({{ $category->events_count }})
                                        </span></a></li>
                            @endforeach
                        </ul>
                    </div><!-- End sidebar categories-->

                    <hr>
                    <div id="skills" class="skills">
                        <div class="container aos-init aos-animate" data-aos="fade-up">
                            {{--
                            <div class="row skills-content">
                                <div class="col-lg-12">
                                    <div class="progress">
                                        <span class="skill">lulah<i class="val">6</i></span>
                                        <div class="progress-bar-wrap">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="55"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 55%">55%</div>
                                        </div>
                                    </div>

                                    <div class="progress">
                                        <span class="skill">خالد احمد<i class="val">3</i></span>
                                        <div class="progress-bar-wrap">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="27"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 27%">27%</div>
                                        </div>
                                    </div>

                                    <div class="progress">
                                        <span class="skill">مقدم فعاليات6<i class="val">1</i></span>
                                        <div class="progress-bar-wrap">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="9"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 9%">9%</div>
                                        </div>
                                    </div>

                                    <div class="progress">
                                        <span class="skill">اسم مقدم فعالية رقم4<i class="val">1</i></span>
                                        <div class="progress-bar-wrap">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="9"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 9%">9%</div>
                                        </div>
                                    </div>


                                </div>
                            </div> --}}

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
                                            href="{{ route('front.events.show', $event) }}">{{ $event->title }}</a></h3>
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
