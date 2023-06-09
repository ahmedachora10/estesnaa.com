<div class="person">
    <div class="container">

        @auth
            @if (auth()->user()->role == 'inventor')
                <div class="mb-3 d-flex justify-content-end mt-3">
                    <a href="{{ route('users.show', auth()->id()) }}" class="btn custom-main-bg-color text-white"
                        style="width:200px">
                        عرف بنفسك
                    </a>
                </div>
            @endif
        @endauth

        <div class="row">

            <div class="col-md-3 bd-sidebar">
                <div class="collapse d-md-block row" id="bd-docs-nav">

                    <nav class="bd-links" aria-label="Main navigation">


                        <ul class="list-group">
                            @foreach ($countries as $country)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input mt-0"
                                            id="exampleCheck{{ $country->id }}"
                                            wire:click="selectCountry({{ $country->id }})"
                                            {{ $country->id == $searchByCountry ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleCheck1">
                                            @if ($country->flag)
                                                <x-country-flag :flag="$country->flag" />
                                            @endif {{ $country->name }}
                                        </label>
                                    </div>

                                    <span class="badge badge-primary badge-pill">
                                        {{ $country->inventors_count }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>


            <main class="col-md-9 bd-content" role="main">
                <div class="card-group">

                    @foreach ($inventors as $inventor)
                        <div class="col-md-4 col-sm-4">
                            <div class="card home w-100">
                                <div class="card person">
                                    <div class="card-body">
                                        <div class="ratio ratio-4x3">
                                            <img src="{{ asset($inventor->avatar) }}" class="card-img-top"
                                                alt="...">
                                        </div>
                                    </div>
                                    <div class="card-footer text-center" style="background-color: white !important">
                                        <h3>
                                            <a class="person-info"
                                                href="{{ route('front.inventors.show', $inventor) }}">
                                                @php
                                                    $countryFlag = $countries->firstWhere('id', $inventor->country_id);
                                                @endphp
                                                @if ($countryFlag && $countryFlag->flag)
                                                    <x-country-flag :flag="$countryFlag->flag" />
                                                @endif
                                                {{ $inventor->name }}
                                            </a>
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
</div>
