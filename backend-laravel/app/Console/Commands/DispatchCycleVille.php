<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Jobs\CycleVille;

class DispatchCycleVille extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:dispatch-cycle-ville';

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
        CycleVille::dispatch();
        $this->info('Cycle ville has been dispatched');
    }
}
