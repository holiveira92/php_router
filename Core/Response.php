<?php

namespace App\Core;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
        return $this;
    }

    public function redirect(string $url)
    {
        header("Location: $url");
    }

    public function returnData(array $data, string $message = "")
    {
        echo json_encode(
            array_merge(
                $data,
                [ "message" => $message ]
            ),
            JSON_PRETTY_PRINT
        );
    }
}