<?php

namespace App\Http\Middleware;

use App\Node\Node;
use Closure;

class NodeAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $node = Node::where('ip', $ip)->first();
        if (is_null($node)) {
            abort(401);
        }

        return $next($request);
    }
}
