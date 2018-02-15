<?php

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @api {get} /nodes List all nodes
     * @apiName GetNodes
     * @apiGroup Nodes
     * @apiVersion 0.1.0-beta
     *
     * @return Node[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $u=JWTAuth::parseToken()->authenticate();
        return $u->nodes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /nodes Create a new node
     * @apiName PostNodes
     * @apiGroup Nodes
     * @apiVersion 0.1.0-beta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Node $node)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        //
    }
}
