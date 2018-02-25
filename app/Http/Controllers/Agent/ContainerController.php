<?php

namespace App\Http\Controllers\Agent;

use App\Container;
use App\Http\SailerResponse;
use Illuminate\Http\Request;

class ContainerController extends BaseAgentController
{
    /**
     * Display a listing of the resource.
     *
     * @return SailerResponse
     */
    public function index()
    {
        return new SailerResponse(true, $this->node->containers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $r
     *
     * @return Container
     */
    public function store(Request $r)
    {
        $r->validate([
            'domain' => 'required',
            'uid' => 'required'
        ]);
        $c = new Container();
        $c->domain = $r->domain;
        $c->uid = $r->uid;
        $c->node_id = $this->node->id;
        $c->save();
        return $c->fresh();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Container $container
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Container $container)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Container           $container
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Container $container)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Container $container
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Container $container)
    {
        //
    }
}
