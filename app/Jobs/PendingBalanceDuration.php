<?php

namespace App\Jobs;

use App\Casts\Status;
use App\Models\Event;
use App\Models\PendingBalance;
use App\Models\Subscription;

class PendingBalanceDuration
{

    public function __invoke()
    {
        $balances = PendingBalance::with('user.profit')->suspensionExpired()->get();

        foreach($balances as $balance) {
            $balance->user->profit()->increment('total', $balance->amount);

            $balance->delete();
        }

    }
}