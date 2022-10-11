<?php

class Usuario
{
    private $nombre;
    private $apellido;
    private $clave;
    private $mail;
    private $localidad;

    public function __construct($nombre,$apellido,$clave,$mail,$localidad)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->localidad = $localidad;
        $this->fecha = date('dd/mm/yy');
    }    
}