<?php

class auto
{
    private $_marca;
    private $_color; 
    private $_precio;   
    private $_fecha;
    
    public function __construct($marca,$color,$precio = 0,$fecha = "")
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
        return "$auto->_marca,$auto->_color,$auto->_precio,$auto->_fecha";       
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

    public static function GuardarAuto($auto)
    {
        $alta = false;
        $archivo = fopen("autos.csv", "a");

        if (is_a($auto, "auto"))
        {    
           fputcsv($archivo, get_object_vars($auto));              
        }
        fclose($archivo);
        return $alta;
    }

    public static function leerAutos()
    {    
        $arrayAutos = array();
        $archivo = fopen("autos.csv","r");

        while(!feof($archivo))
        {
            $datos = fgetcsv($archivo, filesize("autos.csv"));

            if ($datos != false && $datos != null){
                array_push($arrayAutos,new auto($datos[0],$datos[1],intval($datos[2]),$datos[3]));       
            }         
                
        }
       echo $arrayAutos[0];
        fclose($archivo);
        return $arrayAutos;
        
    }
}
?>