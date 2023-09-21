<?php

class Alumno
{
    private string $_nombre;
    private $_apellido;
    private $_legajo;

    function __contruc($nombre,$apellido,$legajo)
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
            $this->_apellido;
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

}

?>