<?php

namespace App\Servidor;

use App\Models\AlienRequests;
use App\Nuptic43\Nuptic43;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ServidorOrbalController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function run(Request $request)
    {
        $params = json_decode($request->input('p'));

        $server = new ServidorOrbal($params);
        return $server->run();
    }

    public function getAll()
    {
        $requests = AlienRequests::get();
        return $requests->toJson();
    }
}
