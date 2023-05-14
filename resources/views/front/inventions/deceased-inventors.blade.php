<x-front>

    <x-breadcrumb title=" المخترعين المتوفين " />

    <div class="container">
        <div class="row">
            <main class="col-md-9 bd-content" role="main">
                <div class="card-group">

                    @foreach ($inventors as $inventor)
                        <div class="col-md-4 col-sm-4">
                            <div class="card home w-100">
                                <div class="card person">
                                    <div class="card-body">
                                        <div class="ratio ratio-4x3">
                                            <img src="{{ asset($inventor->thumb) }}" class="card-img-top"
                                                alt="...">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <h3><a class="person-info" href="#">{{ $inventor->name }}</a>
                                        </h3>
                                        {{-- <h6>{{ $inventor->dob->format('Y-m-d') }}</h6> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="col-md-12 text-center pagination">
                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination">

                            <li class="active"><a class="page-link" href="#">1<span
                                        class="sr-only">(current)</span></a></li>
                        </ul>
                    </nav> --}}

                    {{ $inventors->links() }}

                </div>

            </main>


        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/services.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/skin.deepblue.css') }}">
    @endpush
</x-front>
