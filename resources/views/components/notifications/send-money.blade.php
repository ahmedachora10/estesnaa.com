@if ($checkType)
    <div class="d-flex">
        <div class="flex-shrink-0 me-3">
            <div class="avatar">
                <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-wallet"></i></span>
            </div>
        </div>

        <div class="flex-grow-1">
            <h6 class="mb-1">
                <a href="{{ isset($notification->data['link']) ? $notification->data['link'] : '#!' }}">
                    {!! $notification->data['title'] !!}
                </a>
            </h6>
            <p class="mb-0">{{ $notification->data['content'] }}</p>
            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
        </div>
        <div class="flex-shrink-0 dropdown-notifications-actions">
            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
        </div>
    </div>
@endif
