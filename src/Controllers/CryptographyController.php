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

    public function fetchAll(Request $request, Response $response)
    {
        $users = UserService::fetch();

        if (isset($users['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $users['error']
            ]);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'message' => $users
        ]);
    }

    public function encrypt(Request $request, Response $response)
    {
        $body = $request->body();
        $encrypt = UserService::create($body);

        if (isset($encrypt['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $encrypt['error']
            ]);
        }

        return $response::json([
            'error' => false,
            'success' => true,
            'message' => $encrypt
        ]);
    }

    public function findById(Request $request, Response $response, array $id)
    {
        $user = UserService::findById($id[0]);

        if (isset($user['error'])) {
            return $response::json([
                'error'   => true,
                'success' => false,
                'message' => $user['error']
            ]);
        }

        return $response::json([
            'error'   => false,
            'success' => true,
            'message' => $user
        ]);
    }

    public function update(Request $request, Response $response, array $id)
    {
        $body = $request->body();

        $users = UserService::update($id[0], $body);

        if (isset($users['error'])) {
            return $response::json([
                'error'     => true,
                'success'   => false,
                'message'   => $users['error']
            ]);
        }

        return $response::json([
            'error' => false,
            'success' => true,
            'message' => $users
        ]);
    }

    public function remove(Request $request, Response $response, array $id)
    {
        $user = UserService::delete($id[0]);

        if (isset($user['error'])) {
            return $response::json([
                'error'     => true,
                'success'   => false,
                'message'   => $user['error']
            ]);
        }

        return $response::json([
            'error'     => false,
            'success'   => true,
            'message'   => $user
        ]);
    }
}
