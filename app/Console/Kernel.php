<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\ResultDeclare;
use App\Console\Commands\Settlement; 

class Kernel extends ConsoleKernel
{
  
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(ResultDeclare::class)->everyMinute();
        $schedule->command(Settlement::class)->everyMinute();
    }

   
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
