<?php

namespace App\Jobs;

use App\Events\JackpotFirstEvent;
use App\Repositories\JackpotRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PlayJackpotGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 5;
    public $tries = 3;
    public $roomNumber;
    public $currentTimer = 4;

    /**
     * Create a new job instance.
     * @param $roomNumber
     */
    public function __construct($roomNumber)
    {
        $this->roomNumber=$roomNumber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->roomNumber) {
            case 1:

                while ($this->currentTimer > 0) {
                    $this->currentTimer--;

                    JackpotFirstEvent::dispatch(['timer' => $this->currentTimer]);
                    sleep(1);
                }


                (new JackpotRepository())->start(1);
                break;
            case 2:(new JackpotRepository())->start(2);
                break;
            case 3:(new JackpotRepository())->start(3);
                break;
        }


    }
}
