<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Agent\AgentController;

class ResultDeclare extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'result:declare';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = new AgentController();
        $result->resultdeclared();
    }
}
