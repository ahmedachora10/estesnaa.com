<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <x-dashboard.logo width="25" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ setting('app_name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    @php
        $user = auth()->user();
        $isAdmin = $user->role == 'admin';
        $isEvent = $user->role == 'event';
        $isInventor = $user->role == 'inventor';
        $isServiceProvider = $user->role == 'service_provider';
    @endphp
    <ul class="menu-inner py-1 ps ps--active-y">

        <x-dashboard.sidebar.link :title="trans('sidebar.dashboard')" icon="home-circle" :link="route('dashboard')" />

        @if ($isAdmin)
            <x-dashboard.sidebar.link-head>
                <span>{{ trans('sidebar.users') }} / {{ trans('sidebar.roles') }}</span>
            </x-dashboard.sidebar.link-head>

            <x-dashboard.sidebar.link :title="trans('sidebar.users')" icon="user" :link="route('users.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.roles')" icon="key" :link="route('roles.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.deceased')" icon="user" :link="route('deceased.index')" />

            <x-dashboard.sidebar.link-head>
                <span>{{ trans('sidebar.transactions') }} / {{ trans('sidebar.requests') }}</span>
            </x-dashboard.sidebar.link-head>

            <x-dashboard.sidebar.link :title="trans('sidebar.requests')" icon="user" :link="route('withdrawal_requests.index')" />

            <x-dashboard.sidebar.link-head>
                <span>{{ trans('sidebar.packages') }} / {{ trans('sidebar.subscriptions') }}</span>
            </x-dashboard.sidebar.link-head>

            <x-dashboard.sidebar.link :title="trans('sidebar.packages')" icon="package" :link="route('packages.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.subscriptions')" icon="package" :link="route('subscriptions.index')" />
        @endif

        <x-dashboard.sidebar.link-head>
            @if ($isAdmin)
                <span>{{ trans('sidebar.categories') }}
            @endif
            @if ($isEvent)
                {{ trans('sidebar.events') }}</span>
            @endif

            @if ($isInventor)
                {{ trans('sidebar.inventions') }}</span>
            @endif

            @if ($isServiceProvider)
                {{ trans('sidebar.services') }}</span>
            @endif
        </x-dashboard.sidebar.link-head>

        @if ($isAdmin)
            <x-dashboard.sidebar.link :title="trans('sidebar.categories')" icon="category-alt" :link="route('categories.index')" />
        @endif

        @if ($isAdmin || $isInventor)
            <x-dashboard.sidebar.link title="بيع الاختراعات" icon="brain" :link="route('inventions.index')" />
        @endif

        @if ($isAdmin || $isServiceProvider || $isInventor)
            <x-dashboard.sidebar.link :title="trans('sidebar.services')" icon="cube-alt" :link="route('services.index')" />
        @endif

        @if ($isAdmin || $isEvent || $isInventor)
            <x-dashboard.sidebar.link :title="trans('sidebar.events')" icon="calendar-event" :link="route('events.index')" />
        @endif

        @if ($isAdmin)
            <x-dashboard.sidebar.link-head>
                {{ trans('sidebar.location') }}
            </x-dashboard.sidebar.link-head>

            <x-dashboard.sidebar.link :title="trans('sidebar.countries')" icon="map" :link="route('countries.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.cities')" icon="map-pin" :link="route('cities.index')" />

            <x-dashboard.sidebar.link-head>
                {{ trans('sidebar.settings') }} / {{ trans('sidebar.pages') }}
            </x-dashboard.sidebar.link-head>

            <x-dashboard.sidebar.link :title="trans('sidebar.pages')" icon="file" :link="route('pages.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.featured')" icon="directions" :link="route('featuredservices.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.sliders')" icon="slider-alt" :link="route('sliders.index')" />

            <x-dashboard.sidebar.link :title="trans('sidebar.settings')" icon="cog" :link="route('settings.index')" />
        @endif
        <!-- Misc -->
        {{-- <li class="menu-item">
            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li> --}}
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 686px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 528px;"></div>
        </div>
    </ul>
</aside>
