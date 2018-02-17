<?php

namespace Tests\Unit\Node;

use App\Node\Node;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NodeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $this->node = new Node();
        $this->node->name = 'My amazing node';
        $this->node->ip='1.2.3.4';
        $this->node->user_id=1;
        $this->assertTrue($this->node->save());
    }

    public function testConnect(){
        $canConnect=$this->node->testConnect();
        $this->assertTrue($canConnect);
    }
}
