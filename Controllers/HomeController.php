<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Response;

class HomeController extends BaseController
{
    protected Response $response;
    
    public function __construct()
    {
        $this->response = new Response();
    }

    public function get(Request $request)
    {
        $params = $request->getBody($_GET);
        return $this->response
                ->setStatusCode(200)
                ->returnData($params, "HOME - Dados via GET");
    }

    public function post(Request $request)
    {
        $body = $request->getBody($_POST);
        return $this->response
                ->setStatusCode(201)
                ->returnData($body, "HOME - Dados via POST");
    }

}
