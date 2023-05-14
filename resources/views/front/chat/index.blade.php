<x-front>
    <x-breadcrumb title="رسالة جديدة الى  {{ $chat->serviceProvider->name }}" />

    <section class="chat my-5">
        <div class="container">

            <h4 class="mt-0 fw-bold">
                المشروع:
                <a href="{{ route('front.services.show', $chat->service) }}">{{ $chat->service->name }}</a>
            </h4>

            @livewire('chat-container', ['chat' => $chat])

        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('front/css/services.css') }}"> --}}
    @endpush
</x-front>
