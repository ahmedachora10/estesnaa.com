<div class="offcanvas offcanvas-end" tabindex="-1" id="chats" aria-labelledby="offcanvasRightLabel"
    style="z-index: 999999">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasTopLabel">الرسائل</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @forelse ($chat as $item)
            <a id="chat-room-{{ $item->id }}" href="{{ route('chat.index', $item) }}"
                class="d-flex justify-content-start align-items-start mb-3 py-2 px-3 border-bottom @if ($item->lastMessage->seen == null) bg-light @endif">
                <img src="{{ asset($item->serviceProvider->image) }}" width="40" height="40"
                    class="rounded-circle" alt="avatar">

                <div class="me-3 mt-2">
                    <h4 class="mt-0 fs-16 fw-600 text-purple mb-2">{{ $item->serviceProvider->name }}</h4>
                    <p class="text-muted fw-500 fs-14 text-message" style="margin-top: -5px;">
                        {{ $item->lastMessage->content }}
                    </p>
                </div>
            </a>
        @empty
            <p class="text-secondary" style="font-size: 14px">لا توجد رسائل لعرضها</p>
        @endforelse
    </div>
</div>
