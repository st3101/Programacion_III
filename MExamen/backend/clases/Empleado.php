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

    public static function TraerTodos(PDO $conexion){
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
    public function Modificar(){

    }
    public static function Eliminar($id){

    }

}

    

?>