<?php

namespace App\Jobs;

use App\Repositories\JackpotRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PlayJackpotGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public static $minPlayersReadyFirstRoom = 1;
    public static $minPlayersReadySecondRoom = 1;
    public static $minPlayersReadyThirdRoom = 1;


    /**
     * Create a new job instance.
     *
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
        /*
        while (self::$minPlayersReadyFirstRoom != 0 || self::$minPlayersReadySecondRoom != 0 || self::$minPlayersReadyThirdRoom != 0) {
            sleep(5);
        }

        dispatch(new PlayJackpotGame())
            ->onQueue('jackpotGameProcessing')
            ->delay(Carbon::now()->addSeconds(1));
        */
        /*
                info('--------------');
                info(self::$minPlayersReadyFirstRoom);
                info(self::$minPlayersReadySecondRoom);
                info(self::$minPlayersReadyThirdRoom);
                info('--------------');
                if(self::$minPlayersReadyFirstRoom == 0){
                    (new JackpotRepository())->start(1);

                    self::$minPlayersReadyFirstRoom = 2;
                }
                elseif ( self::$minPlayersReadySecondRoom == 0){
                    (new JackpotRepository())->start(2);

                    self::$minPlayersReadySecondRoom = 2;
                }
                elseif ( self::$minPlayersReadyThirdRoom == 0){
                    (new JackpotRepository())->start(3);

                    self::$minPlayersReadyThirdRoom = 2;
                }


        switch ($this->roomNumber) {
            case 1: (new JackpotRepository())->start(1);
                break;
            case 2:(new JackpotRepository())->start(2);
                break;
            case 3:(new JackpotRepository())->start(3);
                break;
        }

        */
        (new JackpotRepository())->start(1);
    }
}
