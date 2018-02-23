<?php

namespace App\Http\Controllers;

use App\Http\SailerResponse;
use App\Node\Node;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class NodeController extends Controller
{
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

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
        return $this->user->nodes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /nodes Create a new node
     * @apiName PostNodes
     * @apiGroup Nodes
     * @apiVersion 0.1.0-beta
     *
     * @param Request $r
     *
     * @return SailerResponse
     */
    public function store(Request $r)
    {
        $r->validate([
            'name'         => 'required',
            'ip'           => 'required',
            'rootPassword' => 'required',
        ]);
        $node = new Node();
        $node->ip = $r->ip;
        $node->name = $r->name;
        $node->rootPassword = $r->rootPassword;
        $node->user_id = $this->user->id;
        if ($node->testConnect()) {
            $node->save();

            return new SailerResponse(true, $node->fresh());
        } else {
            return new SailerResponse(false, 'Can\'t login to the given server. Please verify the credentials.', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Node $node
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Node                $node
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Node $node)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Node $node
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Node $node)
    {
        //
    }
}
