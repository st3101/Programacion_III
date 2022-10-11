<?php

class conexion
{
    static private $objetoConexion;
    private $objetoPDO;
    
    private function __construct()
    {
        try { 
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=Clase_6;charset=utf8', 'root', '');
                        $this->objetoPDO->exec("SET CHARACTER SET utf8");
            } 
        catch (PDOException $e) { 
            print "Error!: " . $e->getMessage(); 
            die();
        }
    }
}