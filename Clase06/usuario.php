<?php

class Usuario
{
    private $nombre;
    private $apellido;
    private $clave;
    private $mail;
    private $localidad;
    private $fecha;

    public function __construct($nombre,$apellido,$clave,$mail,$localidad)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->localidad = $localidad;
        $this->fecha = date('d/m/y');
    }

    public static function mostrarUsuario($usuario)
    {
        echo $usuario->nombre . " " . $usuario->apellido . " " . $usuario->clave . " " . $usuario->mail . " " . $usuario->localidad . " " . $usuario->fecha;
    }

    public function subirUsuario()
    {
        $conexion = conexion::dameUnObjetoAcceso();

        $consulta = $conexion->RetornarConsulta("INSERT into usuario (nombre, apellido, clave, mail, localidad, fecha_de_registro)
        values('$this->nombre','$this->apellido','$this->clave','$this->mail','$this->localidad','$this->fecha')");

        $consulta->execute();

        echo $conexion->RetornarUltimoIdInsertado();
           
    }

}