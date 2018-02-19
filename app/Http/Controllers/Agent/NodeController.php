<?php

namespace App\Http\Controllers\Agent;

use App\Node\Node;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeController extends BaseAgentController
{

    public function whoami(Request $r)
    {
        return Node::where('ip', $r->ip())->first();
    }
}
