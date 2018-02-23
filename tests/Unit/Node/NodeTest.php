<?php

namespace Tests\Unit\Node;

use App\Node\Node;
use Tests\TestCase;

class NodeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreation()
    {
        $node = new Node();
        $node->name = 'My amazing node';
        $node->ip = '1.2.3.4';
        $node->rootPassword = 'abcd';
        $node->user_id = 1;
        $this->assertTrue($node->save());
    }
}
