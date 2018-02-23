<?php

namespace App\Http\Controllers\Agent;

use App\Http\SailerResponse;

class AppController extends BaseAgentController
{
    public function ping()
    {
        return new SailerResponse();
    }
}
