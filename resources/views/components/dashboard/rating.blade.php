<div id="rateYo-{{ $id }}"></div>

@pushOnce('component-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
@endPushOnce

@pushOnce('component-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
@endPushOnce

@push('scripts')
    <script>
        $("#rateYo-{{ $id }}").rateYo({
            rating: {{ $rate }},
            starWidth: "20px",
            readOnly: true,
            rtl: true
        });
    </script>
@endpush
