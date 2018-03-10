<?php

namespace App\Http\Controllers\Agent;


use App\Http\SailerResponse;
use App\Service;
use Illuminate\Http\Request;

class ServicesController extends BaseAgentController
{
    public function getOrCreate(Request $r){
        $r->validate([
            'name' => 'required'
        ]);
        $service = Service::where('name', $r->name)->where('node_id', $this->node->id)->first();
        if (is_null($service)){
            $service = new Service();
            $service->node_id = $this->node->id;
            $service->password = bin2hex(random_bytes(12));
            $service->name = $r->name;
            $service->save();
            return new SailerResponse(true, ['password' => $service->password], 201);
        }else{
            return new SailerResponse(true, ['password' => $service->password]);
        }
    }

    public function info(Request $r){
        $r->validate([
            'name' => 'required'
        ]);
        $service = Service::where('name', $r->name)->where('node_id', $this->node->id)->first();
        if (is_null($service)) return new SailerResponse(false, null, 404);
        return new SailerResponse(true, $service);
    }
}
