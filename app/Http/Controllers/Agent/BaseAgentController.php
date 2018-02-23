<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Node\Node;

abstract class BaseAgentController extends Controller
{
    public function __construct()
    {
        $this->node = Node::where('ip', $_SERVER['REMOTE_ADDR'])->first();
    }
}
