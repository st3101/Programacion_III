<?php

class usuario
{
    private $usuario;
    private $clave;
    private $mail;
    
    public function __construct($usuario,$clave,$mail)
    {
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public static function MostarInfo($usuario)
    { 
        return $usuario->usuario . " " . $usuario->clave . " " . $usuario->mail . PHP_EOL;
    }

}    


?>