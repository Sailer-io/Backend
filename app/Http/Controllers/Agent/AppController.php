<?php

namespace App\Http\Controllers\Agent;

use App\Http\SailerResponse;
use Illuminate\Http\Request;

class AppController extends BaseAgentController
{
    public function ping(){
        return new SailerResponse();
    }
}
