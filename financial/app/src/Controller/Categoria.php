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
                    'descricao' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit',
                    'valor' => '13.000',
                    'criadaEm' => '01/02/2020'
                ],
                [
                    'nome' => 'categoria 2',
                    'descricao' => 'Eveniet excepturi sapiente magni, delectus deserunt deleniti iste amet',
                    'valor' => '22.682',
                    'criadaEm' => '01/02/2020'
                ],
                [
                    'nome' => 'categoria 3',
                    'descricao' => 'Non, aliquam?',
                    'valor' => '8.200',
                    'criadaEm' => '01/02/2020'
                ],
                [
                    'nome' => 'categoria 4',
                    'descricao' => 'Cumque impedit beatae ex aperiam optio quisquam inventore laborum iste aspernatur',
                    'valor' => '1.350',
                    'criadaEm' => '01/02/2020'
                ],
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
