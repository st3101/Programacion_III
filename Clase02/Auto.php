<?php

class auto
{
    private $_color; 
    private $_precio;
    private $_marca;
    private $_fecha;
    
    public function __construct($marca,$color,$precio = "",$fecha = "")
    { 
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        $this->_fecha = $fecha;
    } 

    function AgregarImpuestos($valor)
    {
        $this->_precio += $valor;
    }

    public static function MostrarAuto($auto)
    {
        return "$auto->_color,$auto->_precio,$auto->_marca,$auto->_fecha";    
        //return "Color: $auto->_color - Precio: $auto->_precio - Marca: $auto->_marca - Fecha: $auto->_fecha";   
    }
    
    public function Equals($auto)
    {
        if($this->_marca == $auto->_marca)
        {
            return true;
        }
        return false;
    }

    public static function Add($auto1, $auto2)
    {
        if($auto1->Equals($auto2) && $auto1->_color == $auto2->_color)
        {         
            return $auto1->_precio + $auto2->_precio;
        }
        return 0;
    }
}
?>