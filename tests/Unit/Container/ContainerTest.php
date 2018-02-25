<?php

namespace Tests\Unit\Container;

use App\Container;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContainerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $c = new Container();
        $c->uid = 'abcd';
        $c->domain = 'example.net';
        $c->node_id = 1;
        $c->repo = 'github.com/Lelenaic/test-dwm';
        $this->assertTrue($c->save());
    }
}
