<x-guest-layout>

    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>تسجيل عضو جديد</h2>
            </div>
        </div>
    </section>

    <div class="register">
        <div class="container">
            <div class="panel panel-default">
                <form method="POST" name="formadd" action="{{ route('register') }}">
                    @csrf

                    <div class="modal-body">
                        <div class="row text-right">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <br>
                                <label for="firstName" class="form-label" style="color:#0e75ce;font-size:20px;">بيانات
                                    التسجيل</label>
                                <hr>

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">الخدمة المطلوب التسجيل فيها</label>
                                        <select name="role_id" class="form-select"
                                            style="width:100%;padding:.375rem .75rem;background-position:left .75rem center;"
                                            required="">
                                            <option value="">حدد الاختيار...</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                        <x-error field="role_id" />
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 row">
                                <hr>
                                <div class="col-lg-9 col-md-9">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">الاسم الرباعي من واقع الهوية</label>
                                        <input type="text" name="name" class="form-control"
                                            style="width:100%;padding:.375rem .75rem;" maxlength="100" required="">
                                        <x-error field="name" />
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">تاريخ الميلاد</label>
                                        <input type="date" name="dob" class="form-control"
                                            style="width:100%;padding:.375rem .75rem;" value="2000-01-01"
                                            required="">
                                        <x-error field="dob" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="firstName" class="form-label">الدولة/الجنسية</label>
                                    <select name="country_id" class="form-select"
                                        style="width:100%;padding:.375rem .75rem;background-position:left .75rem center;"
                                        required="">
                                        <option value="">حدد الاختيار...</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-error field="country_id" />
                                </div>
                                <div class="col-md-5">
                                    <label for="firstName" class="form-label">المدينة</label>
                                    <input type="text" name="city" class="form-control"
                                        style="width:100%;padding:.375rem .75rem;" maxlength="100">
                                    <x-error field="city" />
                                </div>

                                <div class="col-md-3">
                                    <label for="firstName" class="form-label">رقم التلفون/الجوال</label>
                                    <input dir="ltr" type="text" name="phone"
                                        style="width:100%;padding:.375rem .75rem;" class="form-control" maxlength="20">
                                    <x-error field="phone" />
                                </div>

                                <div class="col-md-12">
                                    <label for="firstName" class="form-label">العنوان</label>
                                    <input type="text" name="address" class="form-control"
                                        style="width:100%;padding:.375rem .75rem;" maxlength="100">
                                    <x-error field="address" />
                                </div>

                                <div class="col-md-12">
                                    <label for="firstName" class="form-label">البريد الالكتروني</label>
                                    <input dir="ltr" type="email" name="email" class="form-control"
                                        style="width:100%;padding:.375rem .75rem;" maxlength="100" required="">
                                    <x-error field="email" />
                                </div>


                                <div class="col-md-6 pass">
                                    <div class="col-md-12">
                                        <label for="firstName" class="form-label">كلمة المرور</label>
                                        <input type="password" name="password" class="form-control"
                                            style="width:100%;padding:.375rem .75rem;" maxlength="100"
                                            required="">
                                        <x-error field="password" />
                                    </div>
                                </div>

                                <div class="col-md-6 pass" style="margin:0;padding:0;">
                                    <div class="col-md-12">
                                        <label for="firstName" class="form-label">تاكيد كلمة المرور</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            style="width:100%;padding:.375rem .75rem;" maxlength="100"
                                            required="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <br>
                                    <br>
                                    <label for="firstName" class="form-label" style="color:#0e75ce;font-size:20px;">
                                        * سؤال
                                        التحقق</label>
                                    <hr>

                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label">ماهو المفتــاح الـدولى للاتصالات في
                                            بلدك</label>
                                        <span>استبدل علامة + ب 00</span>
                                        <input dir="ltr" type="number" name="country_code"
                                            class="form-control" maxlength="6"
                                            style="width:100%;padding:.375rem .75rem;" required="">
                                        <x-error field="country_code" />
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="ploice">

                                        <input type="checkbox" aria-label="اوافق على شروط ومعايير التسجيل"
                                            id="myCheck"
                                            style="padding-top:30px;margin-right:10px;display:inline-block;"
                                            required="" name="terms">
                                        <h3 class="ploice" style="padding-top:30px;display:inline-block;">
                                            <a href="https://estesnaa.com/register/assets/pdf/police.pdf">اوافق على
                                                شروط ومعايير
                                                التسجيل </a>
                                        </h3>
                                        <x-error field="terms" />
                                    </div>
                                </div>

                                <div class="div_btn col-md-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block btn-flat"
                                        style="width:20%">تسجيل</button>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .register {
                background: #e9ecef;
                width: 990px;
                margin: 0 auto;
                padding: 3% 0;
            }
        </style>
    @endpush
</x-guest-layout>
