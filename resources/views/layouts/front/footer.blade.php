<footer id="footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>{{ setting('app_name') }}</h3>
                        <p>
                            {{ setting('app_description') }}<br>
                            <br>
                            <strong>تلفون : </strong> <span dir="ltr">{{ setting('phone') }}</span> <br>
                            <strong>البريد الالكتروني : </strong> {{ setting('email') }}<br>
                        </p>
                        <div class="social-links mt-3">

                            {{-- Social Media Buttons --}}
                            @foreach (['facebook', 'twitter', 'youtube', 'linkedin', 'whatsapp'] as $media)
                                @if ($link = setting($media))
                                    <a href="{{ $link }}" class="twitter" target="_blank"><i
                                            class="fab fa-{{ $media }}"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>روابط مهمة</h4>
                    <ul>
                        <li><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}">الرئيسية</a></li>
                        @foreach (\App\Models\Page::active()->get() as $page)
                            <li><i class="fa fa-angle-left"></i> <a
                                    href="{{ route('front.pages.show', $page) }}">{{ $page->title }}</a></li>
                        @endforeach
                        {{-- <li><i class="fa fa-angle-left"></i> <a href="#">سياسة الخصوصية</a></li>
                        <li><i class="fa fa-angle-left"></i> <a href="#">شروط الاستخدام</a></li>
                        <li><i class="fa fa-angle-left"></i> <a href="#">الاسئلة المتكررة</a></li> --}}
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>خدماتنا</h4>
                    <ul>
                        <li><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}/services-details/1">تصنيع
                                الاختراع وافكار المشاريع</a></li>
                        <li><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}/services-details/2">تسويق
                                الخدمات</a></li>
                        <li><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}/services-details/3">استشارات
                                الاعمال</a></li>
                        <li><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}/services-details/4">خدمات
                                قانونية</a></li>
                        <li><i class="fa fa-angle-left"></i> <a href="{{ route('home') }}/services-details/8">مستلزمات
                                الاختراعات</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>القائمة البريدية</h4>

                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="اشتراك">
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="copyright">
            جميع الحقوق محفوظة<strong> © <span>{{ setting('app_name') }}</span></strong> {{ date('Y') }}
        </div>
        <div class="credits">
            {{ setting('footer') }}
        </div>
    </div>
</footer>



<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
