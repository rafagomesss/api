<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/categorias', 'App\Controller\Categoria:getCategorias');
$app->get('/categorias/{id}', 'App\Controller\Categoria:getCategoriasById');
$app->post('/usuario', 'App\Controller\Usuario:registerNewUser');



$app->run();
