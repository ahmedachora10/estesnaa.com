@props(['title' => null, 'description' => null])
<section class="bg-white py-4">
    <div class="container">
        <div class="row justify-content-center flex-column align-items-center">
            <header class="text-center mb-2" style="background: transparent !important;">
                <h1 class="fs-2 fw-bold text-primary" style="line-height: 1.4em">{!! $title !!}</h1>
                @if ($description)
                    <p class="text-dark mt-3 mx-auto" style="width: 80%; line-height: 1.4em">{{ $description }}</p>
                @endif
            </header>
            <section class="text-center mt-5">
                <a href="{{ route('front.packages') }}" class="btn btn-danger" style="width: 200px">اشتراك</a>
            </section>

        </div>
    </div>
</section>
