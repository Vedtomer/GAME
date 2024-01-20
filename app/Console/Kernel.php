<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\ResultDeclare;
use App\Console\Commands\Settlement; // Import the Settlement command

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Uncomment or modify the following line to schedule your command
        $schedule->command(ResultDeclare::class)->daily();
        $schedule->command(Settlement::class)->everyFifteenMinutes(); // Use the fully qualified class name
        // Other scheduled tasks can be added here using the $schedule instance
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
