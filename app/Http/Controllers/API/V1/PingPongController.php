<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

class PingPongController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->json(["Pong"]);
    }
}
