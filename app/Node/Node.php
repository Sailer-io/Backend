<?php

namespace App\Node;

use App\Container;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    const DEFAULT_SSH_PORT = 22;

    protected $hidden = [
        'rootPassword',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Test if the given parameters are correct and if the server is reachable.
     *
     * @return bool
     */
    public function testConnect()
    {
        $c = ssh2_connect($this->ip, static::DEFAULT_SSH_PORT);

        return (bool) @ssh2_auth_password($c, 'root', $this->rootPassword);
    }

    public function containers()
    {
        return $this->hasMany(Container::class);
    }
}
