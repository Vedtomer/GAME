<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
Use App\Http\Controllers\Admin\AdminController;
class Settlement extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:settlement';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $Admin= new AdminController();
        $Admin->settlement();
    }
}
