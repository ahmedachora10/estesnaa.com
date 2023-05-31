<?php

namespace App\Console;

use App\Jobs\PendingBalanceDuration;
use App\Jobs\RemoveTemporaryFiles;
use App\Jobs\SubscriptionExpired;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(new SubscriptionExpired)->everyMinute();
        $schedule->call(new PendingBalanceDuration)->everyMinute();
        $schedule->call(new RemoveTemporaryFiles)->dailyAt('05:43');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}