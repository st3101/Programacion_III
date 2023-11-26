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
        $encontrado = false;
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
        for ($i=0; $i < count($respuestaArray->data[0]); $i++) { 
          if($respuestaArray->data[0][$i]->correo == $correo && $respuestaArray->data[0][$i]->clave == $clave)
          {
            $encontrado = true;
          }
        }

        if($encontrado == false)
        {
          $respuesta = new ResponseMW();
          $respuesta->getBody()->write("Error");
        }
      
        echo "\n\n\n\n\n\n\n";
       
        return $respuesta;
    }
}


?>