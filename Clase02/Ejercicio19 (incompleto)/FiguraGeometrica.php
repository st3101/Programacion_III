<?php

class FiguraGeometrica
{
    protected string $_color; 
    protected int  $_perimetro;
    protected int $_superficie;

    function __construct(string $color,int $perimetro, int $superficie)
    {
        $this->setColor($color);
        $this->_perimetro = $perimetro;
        $this->_superficie = $superficie;
    }

    public function setColor(string $value)
    {  
        if($value != null)
        {
            $this->_color = $value;
        }
    }

    public function getColor()
    {
        if($this->_color != null)
        {
            return $this->_color;
        }
        else
        {
            return "No hay color asignado";
        }
    }
    function __toString()
    {
        return $this->getColor();
    }

    function dibujar()
    {

    }

    function calcuilarDatos()
    {

    }

}