<?php 
require_once ("Usuario.php");
require_once ("ICRUD.php");
class Empleado extends Usuario implements ICRUD
{
public $foto;
public $sueldo;

    public function __construct($id, $nombre, $correo, $clave, $id_perfil, $perfil, $foto, $sueldo) {
    parent::__construct($id, $nombre, $correo, $clave, $id_perfil, $perfil);
    $this->foto = $foto;
    $this->sueldo = $sueldo;
    }

    public static function TraerTodos($conexion){
        try {  
            // Define la consulta SQL para obtener todos los registros de empleados con la descripción del perfil
            $consulta = $conexion->prepare("SELECT e.*, p.descripcion AS perfil_descripcion FROM empleados e JOIN perfiles p ON e.id_perfil = p.id");
    
            // Ejecuta la consulta SQL
            $consulta->execute();
    
            // Inicializa un array para almacenar los objetos Empleado
            $empleados = array();
    
            // Recorre los resultados y crea objetos Empleado
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $empleado = new Empleado(
                    $fila['id'],
                    $fila['nombre'],
                    $fila['correo'],
                    $fila['clave'],
                    $fila['id_perfil'],
                    $fila['perfil_descripcion'], // Descripción del perfil
                    $fila['foto'],
                    $fila['sueldo']
                );
    
                // Agrega el objeto Empleado al array
                $empleados[] = $empleado;
            }
    
            // Retorna el array de objetos Empleado
            return $empleados;
        } catch (PDOException $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la consulta
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            return array(); // Retornar un array vacío en caso de error
        }
    }
    public function Agregar()
    {
        try {
            $conexion = Conexion::UnaConexion();
            // Genera el nombre de archivo para la foto
            $nombre_archivo = "../backend/empleado/fotos/".$this->nombre . '.' . time() . '.jpg';

            // Define la consulta SQL para agregar un nuevo registro en la tabla empleados
            $consulta = $conexion->prepare("INSERT INTO empleados (nombre, correo, clave, id_perfil, foto, sueldo) VALUES (:nombre, :correo, :clave, :id_perfil, :foto, :sueldo)");

            // Bind de los valores de los parámetros
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':id_perfil', $this->id_perfil);
            $consulta->bindParam(':foto', $nombre_archivo);
            $consulta->bindParam(':sueldo', $this->sueldo);

            // Ejecuta la consulta SQL
            $consulta->execute();

            // Verifica si se pudo agregar el registro
            if ($consulta->rowCount() > 0) {
                // Guarda la foto en la ubicación especificada
                $ruta_destino = './backend/empleados/fotos/' . $nombre_archivo;
                // Mueve la foto desde la ubicación temporal (ajusta según tu aplicación)
                move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino);
                
                return true; // Registro agregado exitosamente
            } else {
                return false; // Error al agregar el registro
            }
        } catch (PDOException $e) {
            // Maneja cualquier excepción que pueda ocurrir durante la inserción
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            return false; // Retornar false en caso de error
        }
    }

    public function Modificar(){
        try {
            $conexion = Conexion::UnaConexion();
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Define la consulta SQL para actualizar un registro en la tabla empleados
            if (!empty($_FILES['foto']['tmp_name'])) {
                // Si se proporciona una nueva foto, genera un nuevo nombre de archivo
                $nombre_archivo = $this->nombre . '.' . time() . '.jpg';
                
                // Mueve la nueva foto desde la ubicación temporal a la carpeta de fotos
                move_uploaded_file($_FILES['foto']['tmp_name'], './backend/empleados/fotos/' . $nombre_archivo);

                // Actualiza la foto en la base de datos y el nombre de archivo
                $consulta = $conexion->prepare("UPDATE empleados SET nombre = :nombre, correo = :correo, clave = :clave, id_perfil = :id_perfil, foto = :foto, sueldo = :sueldo WHERE id = :id");
                $consulta->bindParam(':foto', $nombre_archivo);
            } else {
                // Si no se proporciona una nueva foto, actualiza los demás campos sin modificar la foto
                $consulta = $conexion->prepare("UPDATE empleados SET nombre = :nombre, correo = :correo, clave = :clave, id_perfil = :id_perfil, sueldo = :sueldo WHERE id = :id");
            }

            // Bind de los valores de los parámetros
            $consulta->bindParam(':id', $this->id);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':correo', $this->correo);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':id_perfil', $this->id_perfil);
            $consulta->bindParam(':sueldo', $this->sueldo);

            // Ejecuta la consulta SQL
            $consulta->execute();

            // Verifica si se pudo modificar el registro
            if ($consulta->rowCount() > 0) {
                return true; // Registro modificado exitosamente
            } else {
                return false; // Error al modificar el registro
            }
        } catch (PDOException $e) {
            // Maneja cualquier excepción que pueda ocurrir durante la modificación
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            return false; // Retornar false en caso de error
        }


    }
        
    public static function Eliminar($id){
        try {
            // Conecta a la base de datos (ajusta los datos de conexión según tu configuración)
            $conexion = Conexion::UnaConexion();
    
            // Define la consulta SQL para eliminar un registro en la tabla empleados
            $consulta = $conexion->prepare("DELETE FROM empleados WHERE id = :id");
    
            // Bind del valor del parámetro
            $consulta->bindParam(':id', $id);
    
            // Ejecuta la consulta SQL
            $consulta->execute();
    
            // Verifica si se pudo eliminar el registro
            if ($consulta->rowCount() > 0) {
                return true; // Registro eliminado exitosamente
            } else {
                return false; // Error al eliminar el registro (registro no encontrado)
            }
        } catch (PDOException $e) {
            // Maneja cualquier excepción que pueda ocurrir durante la eliminación
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            return false; // Retornar false en caso de error
        }
    }  
}

    

?>