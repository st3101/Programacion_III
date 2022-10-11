<?php

class conexion
{
    static private $objetoConexion;
    private $objetoPDO;
    
    private function __construct()
    {
        try { 
            //Modificar NOMBRE de base de datos (dbname) si se piensa usar en otro proyeto
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=modelodeexamen;charset=utf8', 'root', '');
                        $this->objetoPDO->exec("SET CHARACTER SET utf8");
            } 
        catch (PDOException $e) { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }

    public static function dameUnObjetoAcceso()
    { 
        if (!isset(self::$objetoConexion)) {          
            self::$objetoConexion = new conexion(); 
        } 
        return self::$objetoConexion;        
    }

    public function RetornarConsulta($sql)
    { 
        return $this->objetoPDO->prepare($sql); 
    }
    
    public function RetornarUltimoIdInsertado()
    { 
        return $this->objetoPDO->lastInsertId(); 
    }

    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }
}