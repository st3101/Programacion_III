<?php

use Slim\Psr7\Response as ResponseMW;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

include_once "usuario.php";
include_once "accesoDatos.php";
include_once "islimeable.php";

class verificadora
{
  //valida el CORREO y la CLAVE por el retorno de usuarios en un json y comparando lo con un json 
  function VerificarUsuario(Request $request, RequestHandler $handler): ResponseMW
  {
    $retornoJson = new stdClass();
    $retornoJson->mensaje = "Usuario no encontrado";
    $retornoJson->status = 403;


    //obtengo los datos desde post
    $arrayDatos = $request->getParsedBody();

    //lo decodifico 
    $datosArray = json_decode($arrayDatos["obj_json"]);

    //dsatos separados a validar
    $correo = $datosArray->correo;
    $clave = $datosArray->clave;

    //Llamo al siguiente middlle
    $respuesta = $handler->handle($request);

    //Obtengo el json y lo decodifico 
    $respuestaArray = json_decode($respuesta->getBody());

    //Busco considencias 
    for ($i = 0; $i < count($respuestaArray->data[0]); $i++) {
      if ($respuestaArray->data[0][$i]->correo == $correo && $respuestaArray->data[0][$i]->clave == $clave) {
        $retornoJson->mensaje = "Usuario encontado";
        $retornoJson->status = 403;
      }
    }

    $respuesta = new ResponseMW();
    $respuesta->getBody()->write(json_encode($retornoJson));
    $respuesta->withHeader('Content-Type', 'application/json');

    return $respuesta;
  }

  function VerificarEnviadoJson(Request $request, RequestHandler $handler): ResponseMW
  {
    $jsonCodificado = $request->getParsedBody();

    if (isset($jsonCodificado['obj_json'])) {
      $respuesta = $handler->handle($request);
    } else {
      $respuesta = new ResponseMW();

      $retornoJson = new stdClass();
      $retornoJson->mensaje = "Error, obj_json no encontrado";
      $retornoJson->status = 403;

      $respuesta->getBody()->write(json_encode($retornoJson));
    }

    $respuesta->withHeader('Content-Type', 'application/json');

    return $respuesta;
  }

  function VerificarNoVacioCorreoClave(Request $request, RequestHandler $handler): ResponseMW
  {
    
    $respuesta = new ResponseMW();
    $retornoJson = new stdClass();
    $retornoJson->mensaje = "";
    $retornoJson->status = 403;
    $respuesta->getBody()->write(json_encode($retornoJson));


    $jsonCodificado = $request->getParsedBody();
    $datosArray = json_decode($jsonCodificado["obj_json"]);

  
    if(isset($datosArray->correo) && isset($datosArray->clave) && !empty($datosArray->correo) && !empty($datosArray->clave))
    {
      $respuesta = $handler->handle($request);
    }
    else
    {
      $respuesta = new ResponseMW();
      $retornoJson = new stdClass();
      $retornoJson->mensaje = "Error, Correo o Clave son invalido/s";
      $retornoJson->status = 403;
      $respuesta->getBody()->write(json_encode($retornoJson));
    }
    return $respuesta;
  }

}

