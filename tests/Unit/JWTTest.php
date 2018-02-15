<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $jwt=JWTAuth::fromUser(User::find(1));
        $this->assertRegExp('^[A-Za-z0-9-_]+\.[A-Za-z0-9-_]+\.[A-Za-z0-9-_]*$', $jwt);
    }
}
