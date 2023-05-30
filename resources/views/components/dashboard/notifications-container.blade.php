<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1" dir="rtl">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
        data-bs-auto-close="outside" aria-expanded="false">
        <i class="bx bx-bell bx-sm"></i>
        @if ($unreadNotifications > 0)
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadNotifications }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">اشعارات</h5>
                <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip"
                    data-bs-placement="top" aria-label="Mark all as read" data-bs-original-title="Mark all as read"><i
                        class="bx fs-4 bx-envelope-open"></i></a>
            </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container ps">
            <ul class="list-group list-group-flush">
                @forelse ($notifications as $item)
                    <li @class([
                        'list-group-item list-group-item-action dropdown-notifications-item',
                        'marked-as-read' => !is_null($item->read_at),
                    ])>
                        <x-notifications.send-money :notification="$item" />
                        <x-notifications.store-service :notification="$item" />
                        <x-notifications.new-user :notification="$item" />
                        <x-notifications.new-subscription :notification="$item" />
                    </li>
                @empty
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">لا توجد اشعارات
                        لعرضها</li>
                @endforelse

            </ul>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </li>
        <li class="dropdown-menu-footer border-top">
            <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40">
                عرض كل الاشعارات
            </a>
        </li>
    </ul>
</li>
