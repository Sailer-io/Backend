<?php

namespace App\Http\Controllers;

use App\Http\SailerResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Login the user.
     *
     * @param Request $r
     *
     * @return SailerResponse
     */
    public function login(Request $r)
    {
        $r->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);
        $credentials = $r->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return new SailerResponse(false, 'Invalid credentials', 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return new SailerResponse(false, 'Could not create JWT', 500);
        }

        // all good so return the token
        return new SailerResponse(true, null, 200, ['Authorization' => $token]);
    }

    public function refresh()
    {
        return new Response();
    }
}
