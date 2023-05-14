@props(['model' => null])
@push('scripts')
    <!-- jQuery Sortable Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-sortablejs@latest/jquery-sortable.js"></script>

    <!-- Helper Functions -->
    <script src="{{ asset('assets/js/helpers.js') }}"></script>
    <!-- Custom Script -->
    <script defer>
        sortable($('.table tbody'), {
            url: "{{ route('sort') }}",
            response: res => console.log(res),
        }, "{{ $model }}");
        console.log('Hello___workd');
    </script>
@endpush
