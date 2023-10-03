<?php

class Conexion
{
    public static function UnaConexion()
    {  
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=usuarios_test","root","");
            //$pdo = new PDO("mysql:host=localhost;dbname=mi_base","root","");
        } catch (PDOException $e) {
            // Manejar cualquier excepción que pueda ocurrir al establecer la conexión
            $conexion != null;
            echo "Error de conexión:" . $e->getMessage(); 
        }
        return $conexion;
    }


}

?>