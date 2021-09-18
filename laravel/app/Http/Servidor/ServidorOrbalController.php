<?php

namespace App\Servidor;

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
        $nuptic43 = new Nuptic43(
            (int) $params->idRequest,
            (int) $params->direction,
            $params->route,
            $params->simulatorName,
        );
        $server = new ServidorOrbal($nuptic43);
        return $server->run();
    }
}
