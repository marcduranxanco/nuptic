<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Simulador\SimuladorNuptic43;

class SimuladorNuptic43Comando extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'simulador:nuptic43';

    /**
     * Executes the simulation of Nuptic43 requests.
     *
     * @var string
     */
    protected $description = 'Executes the simulation of Nuptic43 requests';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        for ($i=1; $i <= env('NUM_REQ_SIMULATOR'); $i++) {

            $simulador = new SimuladorNuptic43(env('SERVER_DOMAIN'), $i);
            do {
                $response = $simulador->createRequest();
                $arrayResponse = json_decode($response->getBody()->getContents());
                $requestSuccess = ($arrayResponse->status != 'success');

            } while ($requestSuccess);

        }
        return "Nuptic simulation completed";
    }
}
