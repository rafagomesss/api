<?php

declare(strict_types=1);

namespace App\Controller;

use App\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Categoria
{

    public function getCategorias(Request $request, Response $response)
    {
        $conn = Connection::getInstance();
        $stmt = $conn->query('SELECT * FROM categories');
        $response->getBody()->write(json_encode($stmt->fetchAll()));
        return $response;
    }

    public function getCategoriasById(Request $request, Response $response, $id)
    {
        $response->getBody()->write(
            json_encode(
                [
                    'nome-categoria' => [
                        'id' => current($id),
                        'descricao' => 'alguma coisa',
                        'aplicacao' => 'mobile'
                    ]
                ]
            )
        );
        return $response;
    }
}
