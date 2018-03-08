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
            'uid'    => 'required',
            'repo'   => 'required',
        ]);
        $container = Container::where('domain', $r->domain)->first();
        if (!is_null($container)) {
            return $this->update($r, $container);
        }
        $c = new Container();
        $c->domain = $r->domain;
        $c->uid = $r->uid;
        $c->repo = $r->repo;
        $c->node_id = $this->node->id;
        $c->save();

        return $c->fresh();
    }

    /**
     * Display the specified resource.
     *
     * @param string $domain
     *
     * @return SailerResponse
     */
    public function show(String $domain)
    {
        $c = Container::where('domain', $domain)->first();

        return new SailerResponse(!is_null($c), $c);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request        $r
     * @param \App\Container $container
     *
     * @return Container
     */
    public function update(Request $r, Container $container)
    {
        $r->validate([
            'domain' => 'required',
            'uid'    => 'required',
            'repo'   => 'required',
        ]);
        $container->domain = $r->domain;
        $container->uid = $r->uid;
        $container->repo = $r->repo;
        $container->node_id = $this->node->id;
        $container->save();

        return $container->fresh();
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
