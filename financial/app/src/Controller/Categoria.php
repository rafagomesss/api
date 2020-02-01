<?php declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Categoria
{

    public function getCategorias(Request $request, Response $response)
    {
        $response->getBody()->write(json_encode(
            [
                [
                    'nome' => 'categoria 1',
                    'descricao' => 'criada para teste',
                    'valor' => 13.000,
                    'criadaEm' => '01/02/2020'
                ]
            ]
        ));
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
