<?php

class Alumno
{
    private string $_nombre;
    private $_apellido;
    private $_legajo;

    function __construct($nombre,$apellido,$legajo)
    {
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setLegajo($legajo);
    }

    #region Getter y Setters
    function setNombre($nombre)
    {
        if($nombre != null)
        {
            $this->_nombre = $nombre;
        }
    }

    function getNombre()
    {
        return $this->_nombre;
    }
    function setApellido($apellido)
    {
        if($apellido != null)
        {
            $this->_apellido = $apellido;
        }
    }
    function getApellido()
    {
        return $this->_apellido;
    }

    function setLegajo($legajo)
    {
        if($legajo != null)
        {
            $this->_legajo = $legajo;
        }
    }
    function getLegajo()
    {
        return $this->_legajo;
    }

    #endregion
    static function mostrarUno($alumno)
    {
        if($alumno != null)
        {
            return $alumno->getLegajo()."-".$alumno->getApellido()."-".$alumno->getNombre();
        }
    }

    function mostrarTodos($arrayAlumnos)
    {
        $retorno = "";
        if($arrayAlumnos != null)
        {
            for ($i=0; $i < count($arrayAlumnos); $i++) 
            { 
                $retorno .= Alumno::mostrarUno($arrayAlumnos[$i]);
            }
        }
        return $retorno;
    }
}

?>