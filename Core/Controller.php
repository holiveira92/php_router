<?php

namespace App\Core;

use Exception;
use App\Core\Interfaces\ControllerInterface;
use App\Core\Request;


abstract class Controller implements ControllerInterface
{

    public function __construct()
    {

    }

    public function get(Request $request)
    {
        
    }

    public function post(Request $request)
    {
        
    }

    public function put(Request $request)
    {
        
    }

    public function delete(int $id)
    {
        
    }

}
