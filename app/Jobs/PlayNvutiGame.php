<?php

namespace App\Jobs;

use App\Repositories\NvutiRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PlayNvutiGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout=10;
    public $result;
    protected $nvutiRepository;
    protected $user;
    protected $chance;
    protected $amount;
    protected $stake;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user,$chance,$amount,$stake)
    {
        $this->nvutiRepository = new NvutiRepository();
        $this->user = $user;
        $this->chance = $chance;
        $this->amount = $amount;
        $this->stake = $stake;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->result = $this->nvutiRepository->setBet($this->user, $this->chance, $this->amount, $this->stake);

    }
}
