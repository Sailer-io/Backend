<?php
/**
 * User: Lénaïc GROLLEAU
 * Date: 16/02/18
 * Time: 17:44
 */

namespace App\Node;


abstract class Status
{
    //The server is wait installation
    const WAITING = 0;
    //DWM agent is currently installing on the server
    const INSTALLING = 1;
    //The agent is installed and ready to perform actions
    const READY = 2;
    //The server is not responding or is in error (known or not)
    const ERROR = 3;
    //The node was disabled
    const DISABLED = -1;
}