<?php

namespace App\Http;

class Response
{
    public static function json(string|array $data, int $code = 200)
    {
        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
