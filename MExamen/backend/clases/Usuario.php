<?php

class Usuario {
    // Atributos públicos
    public $id;
    public $nombre;
    public $correo;
    public $clave;
    public $id_perfil;
    public $perfil;

    // Constructor
    public function __construct($id, $nombre, $correo, $clave, $id_perfil, $perfil) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->id_perfil = $id_perfil;
        $this->perfil = $perfil;
    }

    // Método para convertir los datos en formato JSON
    public function ToJSON() {
        $usuarioArray = array(
            "nombre" => $this->nombre,
            "correo" => $this->correo,
            "clave" => $this->clave
        );

        return json_encode($usuarioArray);
    }

    public function GuardarEnArchivo($rutaArchivo) {
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
    
    public function Agregar(PDO $conexion) {

        try {
            // Preparar la consulta SQL para insertar un nuevo usuario
            //$consulta = $conexion->prepare("INSERT usuarios INTO (nombre, correo, clave, id_perfil) VALUES (:nombre, :correo, :clave, :id_perfil)");
            $consulta =  $conexion->prepare("INSERT INTO `usuarios`(`nombre`, `correo`, `clave`, `id_perfil`) VALUES  (:nombre, :correo, :clave, :id_perfil)");

            //Bind de los valores de los atributos a los marcadores de posición
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':id_perfil', $this->id_perfil);       

            // Ejecutar la consulta SQL
            $exito = $consulta->execute();

            return $exito;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // Dentro de la clase Usuario

    public static function TraerTodosJSON() {
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

    public static function MostrarArrayUsuario($usuarios)
    {
        foreach ($usuarios as $item) {
            echo "ID: " . $item->id . "<br>";
            echo "Nombre: " . $item->nombre . "<br>";
            echo "Correo: " . $item->correo . "<br>";
            echo "Clave: " . $item->clave . "<br>";
            echo "ID de Perfil: " . $item->id_perfil . "<br>";
            echo "Perfil: " . $item->perfil . "<br>";
            echo "<br>";
        }
    }

    public static function TraerTodos(PDO $conexion) {
    try {
        // Preparar la consulta SQL para obtener usuarios con descripción de perfil
        $consulta = $conexion->prepare("SELECT `id`, `nombre`, `correo`, `clave`, `id_perfil` FROM `usuarios` WHERE 3");

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
                "A"
            );
            $usuarios[] = $usuario;
        }

        return $usuarios;
    } catch (PDOException $e) {
        // Manejar cualquier excepción que pueda ocurrir durante la consulta
        // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
        return array(); // Retornar un array vacío en caso de error
    }
}
}