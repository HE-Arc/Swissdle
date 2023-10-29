<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Cycle;
use App\Models\Ville;

class CycleVille implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $cycles = Cycle::get();

        if($cycles->isEmpty())
        {
            Cycle::generateCycle();
            return;
        }

        $cycle = $cycles->first();

        $cycle->index += 1;

        if($cycle->index >= $cycle->count)
        {
            $cycle->delete();
            Cycle::generateCycle();
            return;
        }

        $cycle->save();
    }
}
