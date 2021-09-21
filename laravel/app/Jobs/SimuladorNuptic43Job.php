<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Simulador\SimuladorNuptic43;
use Exception;
use Facade\FlareClient\Http\Response;

class SimuladorNuptic43Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        try {
            for ($i=1; $i <= env('NUM_REQ_SIMULATOR'); $i++) {
                $simulador = new SimuladorNuptic43(env('SERVER_DOMAIN'), $i);
                do {
                    $response = $simulador->createRequest();
                    $arrayResponse = json_decode($response->getBody()->getContents());
                    $requestSuccess = ($arrayResponse->status != 'success');
                } while ($requestSuccess);
            }
            $response = new Response("", "Simulation Done. Requests: ". $i, 200);
        } catch (Exception $th) {
            $response = new Response("", "Simulation Error: ".$th->getMessage(), 200);
        }
        return $response;
    }
}
