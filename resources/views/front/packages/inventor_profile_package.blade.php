<x-front>

    <div class="container position-relative">
        <h5 class="text-center pricing-table-subtitle">الخطط المتاحة</h5>
        <h1 class="text-center pricing-table-title">اسعار الباقات</h1>
        <div class="row">
            @foreach ($packages as $index => $package)
                <div class="col-md-4">
                    <div @class([
                        'card pricing-card',
                        'pricing-card-highlighted pricing-plan-pro' => $index == 1,
                        'pricing-plan-basic' => $index == 0,
                        'pricing-plan-enterprise' => $index == 2,
                    ])>
                        <div class="card-body">
                            <i @class([
                                'mdi pricing-plan-icon',
                                'mdi-cube-outline' => $index == 0,
                                'mdi-trophy' => $index == 1,
                                'mdi-wallet-giftcard' => $index == 2,
                            ])></i>
                            <p class="pricing-plan-title">{{ $package->name }}</p>
                            <h3 class="pricing-plan-cost ml-auto">
                                {{ $package->amount == 0 ? 'مجانا' : $package->amount . '$' }}</h3>
                            <h6 class="mb-3 fw-bold duration" style="margin-top: -24px;">
                                {{ date_for_humans($package->duration) }}</h6>
                            <ul class="pricing-plan-features px-0" dir="rtl">
                                @if (!empty($package->features))
                                    @foreach ($package->features as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                @endif
                            </ul>
                            @if (
                                (!is_null($user_plan) && $user_plan->plan_id == $package->id) ||
                                    // (!is_null($user_expired_plan) && $user_expired_plan->plan_id == $package->id) ||
                                    $package->amount == 0)
                                <a href="#" class="btn pricing-plan-purchase-btn bg-secondary disabled">اشتراك</a>
                            @else
                                <a href="{{ route('payment.pay', $package) }}"
                                    class="btn pricing-plan-purchase-btn">اشتراك</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="{{ route('home') }}" class="position-absolute text-secondary"
            style="top: 0; left:0; font-size: 28px"><i class="mdi mdi-arrow-left"></i></a>
    </div>

</x-front>
