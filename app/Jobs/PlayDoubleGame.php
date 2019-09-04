<?php

namespace App\Jobs;

use App\Events\DoubleInformationEvent;
use App\Services\DoubleServices;
use Carbon\Carbon;
use http\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PlayDoubleGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 5;
    public $tries = 1;
    public $currentTimer = 4;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        while ($this->currentTimer > 0) {
            $this->currentTimer--;

            DoubleInformationEvent::dispatch(['timer' => $this->currentTimer]);
            sleep(1);
        }

        (new DoubleServices())->start();

            dispatch(new PlayDoubleGame())
                ->onQueue('doubleGameProcessing')
                ->delay(Carbon::now()->addSeconds(5));


    }
}
