<?php

namespace App\Jobs;

use App\Repositories\DoubleRepository;
use App\Repositories\DoubleSocketRepository;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PlayDoubleGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout =5;
    public $tries = 1;

    private $serverMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->serverMessage=new DoubleSocketRepository();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dispatch(new PlayDoubleGame())
            ->onQueue('doubleGameProcessing')
            ->delay(Carbon::now()->addSeconds(15));

        (new DoubleRepository())->start();
    }
}
