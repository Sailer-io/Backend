<?php

namespace App\Http\Controllers\Agent;

use App\Node\Node;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

abstract class BaseAgentController extends Controller
{
    public function __construct()
    {
        $this->node=Node::where('ip', $_SERVER['REMOTE_ADDR'])->first();
    }
}
