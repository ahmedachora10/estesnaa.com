<x-guest-layout>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center my-5">
            <div class="col-md-10 col-11">
                <div class="mb-4 text-sm text-primary">
                    هل نسيت كلمة السر الخاص بك؟ لا مشكلة. فقط ادخل الايميل الخاص بك وستصلك رسالة فيها رابط تغيير كملة
                    السر الخاص
                    بك
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label class="mb-2" for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
