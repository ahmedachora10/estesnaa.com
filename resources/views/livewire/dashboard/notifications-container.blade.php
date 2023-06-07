<div>
    <x-dashboard.cards.sample column="col-12">
        <h5 class="card-header">الاشعارات</h5>

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
                    <x-notifications.store-event :notification="$item" />
                    <x-notifications.store-invention :notification="$item" />

                </li>
            @empty
                <li class="list-group-item list-group-item-action dropdown-notifications-item">لا توجد اشعارات
                    لعرضها</li>
            @endforelse
        </ul>
    </x-dashboard.cards.sample>

    <div>
        {{ $notifications->links() }}
    </div>
</div>
