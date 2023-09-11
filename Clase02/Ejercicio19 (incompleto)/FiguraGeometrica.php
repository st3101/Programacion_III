<?php

class FiguraGeometrica
{
    protected string $_color; 


    function __construct($_color)
    {
        
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

}