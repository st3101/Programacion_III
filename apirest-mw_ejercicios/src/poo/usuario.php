<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


include_once "AccesoDatos.php";
include_once "islimeable.php";
class Usuario implements ISlimeable
{
    public int $id;
    public string $nombre;
    public string $apellido;
    public string $correo;
    public string $foto;
    public int $id_perfil;
    public string $clave;
    
    function TraerTodos(Request $request, Response $response, array $args): Response
    {

        try
        {
            $todosLosUsuarios = Usuario::traerTodoLosUsuarios();

            $info = array(
                'status' => 'success',
                'message' => 'Operacion correcta',
                'data' => array(
                    $todosLosUsuarios
                )
                );

        }
        catch(Exception $e)
        {
            $info = array(
                'status' => 'failure',
                'message' => 'Operación Fallida'
        );
        
	
        }
    //Convertir el array a formato JSON
    $json_response = json_encode($info);
    
    //Retorno el estatus y el body
    $newResponse = $response->withStatus(200, "OK");
    $newResponse->getBody()->write($json_response);
    
	return $newResponse->withHeader('Content-Type', 'application/json');	

    }
    function TraerUno(Request $request, Response $response, array $args): Response
    {
        $id = $args["id"];

        try
        {
            $usuario = Usuario::traerUnUsuario($id);

            $info = array(
                'status' => 'success',
                'message' => 'Operacion correcta',
                'data' => $usuario
                );         
        }
        catch(Exception $e)
        {
            $info = array(
                'status' => 'failure',
                'message' => 'Operación Fallida'       
        );
        }

    //Convertir el array a formato JSON
    $json_response = json_encode($info);
    
    //Retorno el estatus y el body
    $newResponse = $response->withStatus(200, "OK"); $newResponse = $response->withStatus(200, "OK");
    $newResponse->getBody()->write($json_response);
    
	return $newResponse->withHeader('Content-Type', 'application/json');	
    }
    function AgregarUno(Request $request, Response $response, array $args): Response
    {
        //Traigo todos lo parametros de body post
        $arrayDeParametros = $request->getParsedBody();

        $nombre = $arrayDeParametros['nombre'];
        $apellido = $arrayDeParametros['apellido'];
        $correo = $arrayDeParametros['correo'];
        $id_perfil = $arrayDeParametros['id_perfil'];
        $clave = $arrayDeParametros['clave'];

        //Traigo la foto
		$archivos = $request->getUploadedFiles();

        //defino el la carpeta donde se van a guardar
        $destino = __DIR__ . "/../fotos/";

        //Obtengo el nombre anterior
        $nombreAnterior = $archivos['foto']->getClientFilename();

        //obtengo la extencion
        $extension = explode(".", $nombreAnterior);
        $extension = array_reverse($extension);

        //Creo el nuevo nombre unico
        $Now = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
        $hora = $Now->format('YmdHis');
        $nombreUnico = $hora.".".$extension[0];

        //Creo el destino en el backEnd
        $destinoFinal = $destino . $nombreUnico . "." . $extension[0];
    
        //Muevo la foto a un lugar seguro
		$archivos['foto']->moveTo($destinoFinal);
        
        //Creo el usuario
        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->correo = $correo;
        $usuario->foto = $nombreUnico;
        $usuario->id_perfil = $id_perfil;
        $usuario->clave = $clave;
        $id_agregado = $usuario->insertarUsuario();
        

        // Crear un array asociativo con la información que deseas devolver
        $retorno = array(
            'status' => 'success',
            'message' => 'Operación exitosa',
            'data' => array(
                'resultado' => 'El ultimo id agregado es: '. $id_agregado
            )
        );
        
        // Convertir el array a formato JSON
        $json_response = json_encode($retorno);
        

       //Retorno el estatus y el body
        $newResponse = $response->withStatus(200, "OK");
        $newResponse->getBody()->write($json_response);
        
        // Establecer el encabezado de respuesta como JSON y retorno el mensaje
		return $newResponse->withHeader('Content-Type', 'application/json');	
    }
    function modificarUno(Request $request, Response $response, array $args): Response
    {

        $objEncodidado = $args["cadenaJson"];
        $obj = json_decode($objEncodidado);

        try
        {
            $usuario = new Usuario();
            $usuario->id = $obj->id;
            $usuario->nombre= $obj->nombre;
            $usuario->apellido=$obj->apellido;
            $usuario->correo=$obj->correo;
            $usuario->foto=$obj->foto;
            $usuario->id_perfil=$obj->id_perfil;
            $usuario->clave=$obj->clave;
    
           

            $resultado = $usuario->modificarUsuario();

            $info = array(
                'status' => 'success',
                'message' => 'Operacion correcta',
                'data' => $resultado
                );    
        }
		catch(Exception $e)
        {
            $info = array(
                'status' => 'failure',
                'message' => 'Operacion Fallida'
        );
        }

		$newResponse = $response->withStatus(200, "OK");
		$newResponse->getBody()->write(json_encode($info));
		return $newResponse->withHeader('Content-Type', 'application/json');
          
    }
    function BorrarUno(Request $request, Response $response, array $args): Response
    {
        try
        {
            $resultado = Usuario::elimarUnUsuario($args["id"]);

            $info = array(
                'status' => 'success',
                'message' => 'Operacion correcta',
                'data' => $resultado
                );    
        }
		catch(Exception $e)
        {
            $info = array(
                'status' => 'failure',
                'message' => 'Operacion Fallida'
        );
        }

		$newResponse = $response->withStatus(200, "OK");
		$newResponse->getBody()->write(json_encode($info));
		return $newResponse->withHeader('Content-Type', 'application/json');
    }

    public function login(Request $request, Response $response, array $args): Response
    {

        try {
            $arrayDatos = $request->getParsedBody();

            $usuario = Usuario::buscarUsuarioLogin($arrayDatos["correo"]);
           
            if($usuario->clave != $arrayDatos["clave"])
            {
                throw new Exception("Correo o contraseña invalida");            
            }

            $info = array(
                'status' => 'success',
                'message' => 'Usuario Logeado',
                'login' => true
            );
        }
		catch(Exception $e)
        {
            $info = array(
                'status' => 'failure',
                'message' => $e->getMessage(),
                'login' => false
        );
        }
        $newResponse = $response->withStatus(200, "OK");
		$newResponse->getBody()->write(json_encode($info));
		return $newResponse->withHeader('Content-Type', 'application/json');
    }

    public function buscarUsuarioLogin($correo)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM usuarios WHERE correo = '$correo'");
        $consulta->execute();                           
        return $consulta->fetchObject("usuario");	
    }
    public function traerTodoLosUsuarios()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM usuarios");
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	

    }
    public function insertarUsuario()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->retornarConsulta("INSERT INTO usuarios (nombre, apellido, correo, foto, id_perfil, clave) VALUES ('$this->nombre', '$this->apellido', '$this->correo', '$this->foto','$this->id_perfil', '$this->clave')");
		$consulta->execute();		
		return $objetoAccesoDato->retornarUltimoIdInsertado();
	}

    public function traerUnUsuario($usuario_id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->retornarConsulta("SELECT * FROM usuarios WHERE id = $usuario_id");
        $consulta->execute();
        return $consulta->fetchObject("usuario");
    }

    public function modificarUsuario()
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();

        $consulta = $objetoAccesoDato->retornarConsulta("UPDATE usuarios
        set nombre='$this->nombre',
            apellido='$this->apellido',
            correo='$this->correo',
            foto='$this->foto',
            id_perfil='$this->id_perfil',
            clave='$this->clave'
        WHERE id='$this->id'");
 
        return $consulta->execute();

    }

    public function elimarUnUsuario($usuario_id)
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->retornarConsulta("DELETE FROM usuarios WHERE id = $usuario_id");
        return $consulta->execute();
    }

 
}
