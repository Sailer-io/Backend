<?php

namespace App;

use App\Node\Node;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    public function node()
    {
        return $this->belongsTo(Node::class);
    }
}
