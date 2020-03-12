<?php

declare(strict_types=1);

namespace App\Controller;

use App\DB\Connection;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Usuario
{

    public function registerNewUser(Request $request, Response $response, $args)
    {
        try {
            $conn = Connection::getInstance();
            $login = $request->getParsedBody()['login'];
            $senha = $request->getParsedBody()['password'];
            $stmt = $conn->prepare(
                'INSERT INTO user_access SET login = :login,
            password = :password,
            id_level = :id_level,
            id_personal_data = :id_personal_data,
            personal_data_complete = :personal_data_complete'
            );
            $stmt->bindValue(':login', $login);
            $stmt->bindValue(':password', $senha);
            $stmt->bindValue(':id_level', 1);
            $stmt->bindValue(':id_personal_data', 1);
            $stmt->bindValue(':personal_data_complete', 0);
            $stmt->execute();
            $retorno = ['message' => 'Falha ao cadastrar usuário, por favor tente novamente!'];
            if ($stmt->rowCount() > 0) {
                $retorno = ['message' => 'Usuário inserido com sucesso!'];
            }
        } catch (\Throwable $e) {
            $retorno = ['code' => $e->getCode(), 'message' => $e->getMessage()];
        }
        $response->getBody()->write(json_encode($retorno));
        return $response;
    }
}
