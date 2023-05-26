<?php

namespace App\Core;

class Request
{

    public function __construct()
    {
    }

    public function getPath(): string
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        $position = strpos($path, "?");

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getBody(): array
    {
        $body = [];
        
        if ($this->getMethod() === "get") {
            $body = $this->sanitizeGet($_GET);
        }

        if ($this->getMethod() === "post") {
            $body = $this->sanitizePost($_POST);
        }

        return $body;
    }

    private function sanitizeGet(array $getBody): array
    {
        $getData = [];
        foreach($getBody as $key => $getValue) {
            $getData[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $getData;
    }

    private function sanitizePost(array $postBody): array
    {
        $postData = json_decode(file_get_contents("php://input"), true);
        foreach($postBody as $key => $postValue) {
            $postData[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $postData;
    }

}
