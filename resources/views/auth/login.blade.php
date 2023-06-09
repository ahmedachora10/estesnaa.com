<x-guest-layout>

    <div class="login-box">
        <div class="login-box-body">
            <div class="login-logo text-center">
                <img src="{{ asset(setting('logo')) }}" width="150">
            </div>

            <hr>
            @if (session()->get('warning'))
                <div class="alert alert-warning mb-2">{{ session('warning') }}</div>
                <hr>
            @endif

            @if (session()->get('danger'))
                <div class="alert alert-danger mb-2">{{ session('danger') }}</div>
                <hr>
            @endif
            <form method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback mb-2">
                    <input type="email" class="form-control" name="email" placeholder="اسم المستخدم" required=""
                        autofocus>
                    <i class="glyphicon glyphicon-user form-control-feedback"></i>
                </div>
                @error('email|password')
                    <span class="text-danger mt-2 mb-3">{{ $message }}</span>
                @enderror
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="كلمة المرور"
                        required="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <a href="{{ route('password.request') }}" class="text-primary mt-2 my-2 d-block">هل نسيت كلمة السر؟</a>
                <br>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12 text-center">
                        <button type="submit" name="login"
                            class="btn btn-primary btn-block btn-flat w-100">دخول</button>
                    </div>
                    <div class="col-xs-6">
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('front/css/admin_lte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/admin_lte_rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/home.css') }}">
    @endpush
</x-guest-layout>
