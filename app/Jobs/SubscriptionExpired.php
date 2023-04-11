<?php

namespace App\Jobs;

use App\Casts\Status;
use App\Models\Event;
use App\Models\Subscription;
use Illuminate\Support\Facades\File;

use function Clue\StreamFilter\fun;

class SubscriptionExpired
{

    public function __invoke()
    {
        Subscription::active()->where('end_date' , '<', date('Y-m-d'))->update(['status' => Status::DISABLED->value]);

        Event::active()->whereDoesntHave('owner.plan')->update(['status' => Status::DISABLED->value]);
    }
}