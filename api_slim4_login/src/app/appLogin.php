<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../Poo/usuario.php";

$app = AppFactory::create();
 
use \Slim\Routing\RouteCollectorProxy;
$app->group('/usuario', function (RouteCollectorProxy $grupo) {   

    $grupo->get('/', Usuario::class . ':traerTodos');
    $grupo->get('/{id}', \Usuario::class . ':traerUno');
    $grupo->post('/', \Usuario::class . ':agregarUno');
    $grupo->post("/login/",\Usuario::class . ":login");
    $grupo->put('/{cadenaJson}', \Usuario::class . ':modificarUno');
    $grupo->delete('/{id}', \Usuario::class . ':borrarUno');

});


//CORRE LA APLICACIÓN.
$app->run();




