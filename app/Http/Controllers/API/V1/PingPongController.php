<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;

/**
 * @group Health
 * 
 * Endpoints for checking health of api
 */
class PingPongController extends Controller
{
    /**
     * Check Program Health
     */
    public function __invoke()
    {
        return response()->json(["Pong"]);
    }
}
