<nav id="navbar" class="navbar">
    <ul>
        <li>
            <a @class(['nav-link scrollto', 'active' => request()->routeIs('home')]) href="{{ route('home') }}">
                الرئيسية
            </a>
        </li>
        <li>
            <a @class([
                'nav-link scrollto',
                'active' => request()->routeIs('front.services.*'),
            ]) href="{{ route('front.services.index') }}">
                الخدمات
            </a>
        </li>
        <li>
            <a @class([
                'nav-link scrollto',
                'active' => request()->routeIs('front.events.*'),
            ]) href="{{ route('front.events.index') }}">
                الفعاليات
            </a>
        </li>
        <li>
            <a @class([
                'nav-link scrollto',
                'active' => request()->routeIs('front.inventors.*'),
            ]) href="{{ route('front.inventors.index') }}">
                التعريف بالمخترعين
            </a>
        </li>
        <li>
            <a @class([
                'nav-link scrollto',
                'active' => request()->routeIs('front.inventions.*'),
            ]) href="{{ route('front.inventions.index') }}">
                بيع الاختراعات
            </a>
        </li>
        @guest
            <li>
                <a @class([
                    'nav-link scrollto',
                    'active' => request()->routeIs('register'),
                ]) href="{{ route('register') }}">
                    سجل الان
                </a>
            </li>
        @endguest
    </ul>

    <form class="search-form d-flex align-items-center ajaxform" data-append="#main" method="POST" action="">
        <input type="text" value="" name="q" placeholder="بحث ..." title="Enter search keyword">
        <button type="submit" title="Search">
            <i class="fa fa-search"></i>
        </button>

    </form>

    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>
