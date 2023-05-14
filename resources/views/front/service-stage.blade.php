<x-front>
    <x-breadcrumb :title="$service->name" />
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row justify-content-between align-items-center mt-4 mb-4">
                <div class="col-md-8 mt-2">
                    <h2 class="fs-2 fw-bold my-0 lh-sm mb-0">{{ $service->name }}</h2>
                </div>

                <div class="col-md-4 mt-2">
                    <!-- Example split danger button -->
                    <div class="btn-group flex-row-reverse float-start">
                        @if (auth()->user()->role == 'admin' ||
                                (!$service_stage->is_canceled && !$service_stage->is_receipted && $service->user_id != auth()->id()))
                            <button type="button"
                                class="btn btn-outline-{{ $service_stage->stage->color() }} py-1 dropdown-toggle dropdown-toggle-split rounded-0"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                        @endif
                        <button type="button" class="btn btn-outline-{{ $service_stage->stage->color() }} py-1">
                            @if ($service_stage->stage == App\Casts\Stage::IMPLEMENT)
                                {{ $service_stage->stage->name() }}
                            @else
                                تم {{ $service_stage->stage->name() }} المشروع
                            @endif
                        </button>
                        @if (auth()->user()->role == 'admin' ||
                                (!$service_stage->is_canceled && !$service_stage->is_receipted && $service->user_id != auth()->id()))
                            <ul class="dropdown-menu dropstart text-end">
                                <li><a class="dropdown-item text-{{ App\Casts\Stage::RECEIPT->color() }}"
                                        href="{{ route('front.services.stage.change', [$service_stage, App\Casts\Stage::RECEIPT]) }}">{{ App\Casts\Stage::RECEIPT->name() }}
                                        المشروع</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a href="{{ route('front.services.stage.change', [$service_stage, App\Casts\Stage::CANCEL]) }}"
                                        class="dropdown-item text-{{ App\Casts\Stage::CANCEL->color() }}">{{ App\Casts\Stage::CANCEL->name() }}
                                        المشروع</a>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <hr class="text-secondary">

            <div class="row gy-4 mt-5">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper bg-white">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ asset($service->image) }}" alt="image" class="w-100">
                            </div>

                            <div class="description-container my-5 px-4 pb-5">
                                {!! $service->description !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="bg-white">
                        <div class="border-bottom py-3 px-3 bg-light">
                            <h6 class="fw-bold my-0" style="font-size: 14px;">بطاقة الخدمة</h6>
                        </div>

                        <div class="portfolio-info">
                            <ul>
                                <li><span class="fw-bold">التصنيف</span>: {{ $service->category->name }}</li>
                                <li><span class="fw-bold">السعر</span>: <span class="text-success fw-bold"
                                        style="font-size: 18px">{{ $service->price }}$</span></li>
                                <li><span class="fw-bold">التاريخ</span>: {{ $service->created_at->diffForHumans() }}
                                </li>
                            </ul>
                        </div>

                        <div class="border-top py-3 px-3 bg-light">
                            <h6 class="fw-bold my-0" style="font-size: 14px;">صاحب الخدمة</h6>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top p-3">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset($service->owner->image) }}" alt="user avatar" class="rounded-circle"
                                    width="40" height="40">
                                <a href="#!" class="fs-6 text-dark me-2"
                                    style="font-weight: 500">{{ $service->owner->name }}</a>
                            </div>
                        </div>

                        <div class="border-top py-3 px-3 bg-light">
                            <h6 class="fw-bold my-0" style="font-size: 14px;">تقييم صاحب الخدمة</h6>
                        </div>

                        <div class="p-3 border-top">
                            @if (
                                $service->user_id != auth()->id() &&
                                    count($service->rating) < 1 &&
                                    ($service_stage->is_canceled || $service_stage->is_receipted))
                                <a href="" class="btn btn-primary py-1 px-4 fw-bold rounded-1"
                                    style="font-size: 14px" data-bs-toggle="modal" data-bs-target="#add-rating">اضافة
                                    تقييم</a>
                            @endif

                            @if ($service->rating->count() > 0 || (auth()->user()->role == 'admin' || $service->user_id == auth()->id()))
                                {{-- <div id="display-rating"></div> --}}
                                {{-- <blockquote class="blockquote mt-3">
                                    <p>{{ $service->rating->first()->comment }}</p>
                                </blockquote> --}}

                                <figure>
                                    <blockquote class="blockquote">
                                        <div id="display-rating"></div>
                                    </blockquote>
                                    <figcaption class="blockquote-footer mt-3" style="line-height: 1.5em">
                                        {{ $service->rating->first()->comment }}
                                    </figcaption>
                                </figure>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($chat)
                    <div class="col-lg-8 mt-0">
                        <h3 class="mt-0">نقاش الصفقة</h3>
                        @livewire('chat-container', ['chat' => $chat])
                    </div>
                @endif

            </div>

        </div>
    </section>

    <div class="modal" tabindex="-1" id="add-rating" dir="rtl">
        <div class="modal-dialog">
            <form action="{{ route('front.user.rating.store') }}" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> اضافة تقييم </h5>
                        <button type="button" class="btn-close mx-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-4">
                            <div id="rateYo"></div>
                            <input type="hidden" name="service_id" id="service_id" value="{{ $service->id }}">
                            <input type="hidden" name="service_stage_id" id="service_stage_id"
                                value="{{ $service_stage->id }}">
                            <input type="hidden" name="rating" id="rating">
                            @error('rating')
                                <span class="d-block mt-2 text-danger"> {{ $message }} </span>
                            @enderror

                            @error('service_id')
                                <span class="d-block mt-2 text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rating-comment" class=" form-label">تعليق</label>
                            <textarea name="comment" class=" form-control" id="rating-comment" rows="2"></textarea>
                            @error('comment')
                                <span class="d-block mt-2 text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary py-1 rounded-1"
                            data-bs-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary py-1 rounded-1 fw-bold"> حفظ </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script>
            $(function() {

                $("#rateYo").rateYo({
                    normalFill: "#A0A0A0",
                    rtl: true,
                    maxValue: 5
                });

                $("#rateYo").click(function() {
                    const rating = $("#rateYo").rateYo("option", "rating");

                    $('#rating').val(rating);

                });

                @if (count($service->rating) > 0)
                    $("#display-rating").rateYo({
                        normalFill: "#A0A0A0",
                        rtl: true,
                        maxValue: 5,
                        rating: {{ $service->rating->first()->rating }},
                        readOnly: true
                    });
                @endif

            });
        </script>
    @endpush
</x-front>
