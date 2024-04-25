<?php

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use App\Services\UserService;

class CryptographyController
{
    public function index(Request $request, Response $response)
    {
        return $response::json([
            "Acesse o arquivo 'api.php' para ter acesso a todas as rotas da API"
        ]);
    }

    public function fetch()
    {
    }

    public function encrypt(Request $request, Response $response)
    {
        $body = $request->body();
        $save = UserService::create($body);
    }

    public function findById(string $id)
    {
    }

    public function update()
    {
    }

    public function remove(string $id)
    {
    }
}
