<?php

//require_once('C:/xampp/htdocs/Programacion_III/practica/backend/clases/IBM.php');
require_once ("IBM.php");
 class Usuario implements IBM{
    public $id;
    public $nombre;
    public $correo;
    public $clave;
    public $id_perfil;
    public $perfil;

    public function __construct($id, $nombre, $correo, $clave, $id_perfil, $perfil){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->id_perfil = $id_perfil;
        $this->perfil = $perfil;
    }

    public function ToJSON(){
        // Método para convertir los datos en formato JSON
        $usuarioArray = array(
            "nombre" => $this->nombre,
            "correo" => $this->correo,
            "clave" => $this->clave
        );

        return json_encode($usuarioArray);
    }

    public function GuardarEnArchivo($rutaArchivo){
        // Crear un arreglo con los datos del usuario
        $usuarioArray = array(
            'id' => $this->id,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'clave' => $this->clave,
            'id_perfil' => $this->id_perfil,
            'perfil' => $this->perfil
        );
    
        // Leer el contenido actual del archivo JSON
        $usuariosExistente = [];
        if (file_exists($rutaArchivo)) {
            $contenidoArchivo = file_get_contents($rutaArchivo);
            $usuariosExistente = json_decode($contenidoArchivo, true);
        }
    
        // Agregar el nuevo usuario al arreglo existente
        $usuariosExistente[] = $usuarioArray;
    
        // Convertir el arreglo de usuarios a formato JSON
        $usuariosJson = json_encode($usuariosExistente, JSON_PRETTY_PRINT);
    
        // Escribir el JSON en el archivo
        if (file_put_contents($rutaArchivo, $usuariosJson)) {
            // Éxito al guardar el usuario
            return json_encode(array(
                'exito' => true,
                'mensaje' => 'Usuario guardado con éxito.'
            ));
        } else {
            // Error al guardar el usuario
            return json_encode(array(
                'exito' => false,
                'mensaje' => 'Error al guardar el usuario en el archivo.'
            ));
        }
    }
    public function Agregar(){
        try {
            $conexion = Conexion::UnaConexion();
            // Preparar la consulta SQL para insertar un nuevo usuario
            //$consulta = $conexion->prepare("INSERT usuarios INTO (nombre, correo, clave, id_perfil) VALUES (:nombre, :correo, :clave, :id_perfil)");
            $consulta =  $conexion->prepare("INSERT INTO `usuarios`(`nombre`, `correo`, `clave`, `id_perfil`, perfil) VALUES  (:nombre, :correo, :clave, :id_perfil, :perfil)");

            //Bind de los valores de los atributos a los marcadores de posición
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':id_perfil', $this->id_perfil);       
            $consulta->bindParam(':perfil', $this->perfil);       
            
            // Ejecutar la consulta SQL
            $exito = $consulta->execute();

            return $exito;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function TraerTodosJSON(){
        $rutaArchivo = './backend/archivos/usuarios.json';

        // Verificar si el archivo existe
        if (file_exists($rutaArchivo)) {
            // Leer el contenido del archivo JSON
            $contenidoArchivo = file_get_contents($rutaArchivo);

            // Decodificar el JSON en un array asociativo
            $usuariosArray = json_decode($contenidoArchivo, true);

            // Verificar si la decodificación fue exitosa
            if ($usuariosArray !== null) {
                $usuarios = array();

                // Convertir los arrays asociativos en objetos Usuario
                foreach ($usuariosArray as $usuarioData) {
                    $usuario = new Usuario(
                        $usuarioData['id'],
                        $usuarioData['nombre'],
                        $usuarioData['correo'],
                        $usuarioData['clave'],
                        $usuarioData['id_perfil'],
                        $usuarioData['perfil']
                    );

                    $usuarios[] = $usuario;
                }

                return $usuarios;
            }
        }

        return array(); // Retornar un array vacío si no se pudo recuperar ningún usuario
    }
    public function MostraUnUsuario(){
        $retorno = "";
            $retorno.= "ID: " . $this->id . "<br>";
            $retorno.= "Nombre: " . $this->nombre . "<br>";
            $retorno.= "Correo: " . $this->correo . "<br>";
            $retorno.= "Clave: " . $this->clave . "<br>";
            $retorno.= "ID de Perfil: " . $this->id_perfil . "<br>";
            $retorno.= "Perfil: " . $this->perfil . "<br>";
            $retorno.= "<br>";
        return $retorno;
    }
    public static function MostrarArrayUsuario($usuarios){
        $retorno = "";
        foreach ($usuarios as $item) {
            $retorno .= $item->MostraUnUsuario();
        }
        return $retorno;
    }

    public static function TraerTodos(PDO $conexion) {
        try {
            // Preparar la consulta SQL para obtener usuarios con descripción de perfil
            $consulta = $conexion->prepare("SELECT `id`, `nombre`, `correo`, `clave`, `id_perfil`, perfil FROM `usuarios`");

            // Ejecutar la consulta SQL
            $consulta->execute();

            // Obtener los resultados como objetos Usuario
            $usuarios = array();
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['correo'],
                    $fila['clave'],
                    $fila['id_perfil'],
                    $fila['perfil']
                );
                $usuarios[] = $usuario;
            }

            return $usuarios;
        } catch (PDOException $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la consulta
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            echo $e->getMessage(); //Muestro el error
            return array(); // Retornar un array vacío en caso de error
        }
    }

    public static function TraerUno(PDO $conexion, $params) {
        try {
            // Preparar la consulta SQL para obtener un usuario por correo y clave
            $consulta = $conexion->prepare("SELECT id, nombre, correo, clave, id_perfil, perfil
                                           FROM usuarios 
                                           WHERE correo = :correo AND clave = :clave");
    
            // Bind de los valores de los parámetros
            $consulta->bindParam(':correo', $params["correo"]);
            $consulta->bindParam(':clave', $params["clave"]);
    
            // Ejecutar la consulta SQL
            $consulta->execute();
    
            // Obtener el resultado como objeto Usuario
            if ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['correo'],
                    $fila['clave'],
                    $fila['id_perfil'],
                    $fila['perfil']
                );
                return $usuario;
            } else {
                return null; // No se encontró ningún usuario con el correo y clave proporcionados
            }
        } catch (PDOException $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la consulta
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            return null; // Retornar null en caso de error
        }
    }

    public function Modificar(){
            try {
                $conexion = Conexion::UnaConexion();
        
                // Define la consulta SQL para actualizar el registro
                $consulta = $conexion->prepare("UPDATE usuarios SET nombre = :nombre, correo = :correo, clave = :clave, id_perfil = :id_perfil WHERE id = :id");
        
                // Bind de los valores de los parámetros
                $consulta->bindParam(':id', $this->id);
                $consulta->bindParam(':nombre', $this->nombre);
                $consulta->bindParam(':correo', $this->correo);
                $consulta->bindParam(':clave', $this->clave);
                $consulta->bindParam(':id_perfil', $this->id_perfil);
        
                // Ejecuta la consulta SQL
                $consulta->execute();
        
                // Verifica si se realizó la modificación
                if ($consulta->rowCount() > 0) {
                    return true; // La modificación fue exitosa
                } else {
                    return false; // No se modificó ningún registro (id no encontrado)
                }
            } catch (PDOException $e) {
                // Manejar cualquier excepción que pueda ocurrir durante la modificación
                // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
                return false; // Retornar false en caso de error
            }
        
    }

    public static function Eliminar($id) {
        // Implementación del método Eliminar de la interfaz IBM
            try {
                // Conecta a la base de datos (ajusta los datos de conexión según tu configuración)
                $conexion = Conexion::UnaConexion();

                // Define la consulta SQL para eliminar el registro por ID
                $consulta = $conexion->prepare("DELETE FROM usuarios WHERE id = :id");

                // Bind del valor del parámetro ID
                $consulta->bindParam(':id', $id);

                // Ejecuta la consulta SQL
                $consulta->execute();

                // Verifica si se realizó la eliminación
                if ($consulta->rowCount() > 0) {
                    return true; // La eliminación fue exitosa
                } else {
                    return false; // No se eliminó ningún registro (id no encontrado)
                }
            } catch (PDOException $e) {
                // Manejar cualquier excepción que pueda ocurrir durante la eliminación
                // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
                return false; // Retornar false en caso de error
            } 
    }
}
?>