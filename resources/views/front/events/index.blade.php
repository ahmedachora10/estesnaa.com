<x-front>
    <x-breadcrumb title="الفعاليات" />

    @livewire('events-filter')


    {{-- @auth
        @if (auth()->user()->role == 'event')
            <x-package-subscribe-section title="احصل على تجربة فريدة </br> مع باقات الفعاليات الحصرية"
                description=" نوفر لك مجموعة من الفعاليات المثيرة والمتنوعة، بما في ذلك الحفلات الموسيقية والعروض الفنية والرياضية والثقافية والترفيهية. اشترك الآن واحجز مقعدك في الفعالية المفضلة لديك واستمتع بتجربة لا تنسى مع الأصدقاء والعائلة" />
        @endif
    @endauth --}}

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
