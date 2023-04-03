<?php

namespace App\Jobs;

use App\Casts\Status;
use App\Models\Event;
use App\Models\Subscription;

use function Clue\StreamFilter\fun;

class SubscriptionExpired
{
    public function __invoke()
    {
        Subscription::where('end_date' , '<', date('Y-m-d'))->delete();

        $events = Event::with('owner.plan')->active()->whereHas('owner', function ($query)
        {
            $query->whereHas('plan', function ($q)
            {
                $q->where('end_date', '<', date('Y-m-d'));
            });
        })->update(['status' => Status::DISABLED->value]);
    }
}