<?php
class Pizza
{   
    private $_sabor;
    private $_precio;
    private $_tipo;
    private $_cantidad;

    public function __construct($sabor,$precio,$tipo,$cantidad)
    {
        $this->_sabor = $sabor;
        $this->_precio = $precio;
        $this->_tipo = $tipo;
        $this->_cantidad = $cantidad;       
    }
      
    public static function archivoInfo($pizza)
    {
        return "$pizza->_sabor,$pizza->_precio,$pizza->_tipo,$pizza->_cantidad";
    }

    public static function guardarUnaPizzaJson($pizza)
    {
        $retorno = false;
        $archivo = fopen("pizzas.json", "a");

        if (is_a($pizza, "pizza"))
        {    
           $datos=json_encode(get_object_vars($pizza));
           
           if($datos != null)
           {
            fwrite($archivo, $datos);  
            $retorno = true;  
           }                
        }
        fclose($archivo);

        return $retorno;
    }

    public static function guardarArrayPizzasJson($arrayPizzas)
    {
        $retorno = false;

        foreach($arrayPizzas as $item)       
        {
            $retorno = false;

            if(pizza::GuardarUnaPizzaJson($item))
            {               
                $retorno = true;
            };        
        }
        return $retorno;
    }

    public static function buscarPizza($arrayPizzas, $pizza)
    {      
            for ($i=0;$i<count($arrayPizzas);$i++)
            {
                if($arrayPizzas[$i]->_sabor == $pizza->_sabor && $arrayPizzas[$i]->_tipo == $pizza->_tipo)
                {     
                    return $i;                   
                }      
            }                
        return -1;
    }

    public static function actualizarPrecio($arrayPizzas,$pizza)
    {
        $indice = Pizza::buscarPizza($arrayPizzas,$pizza);

        if($indice > -1)
        {  
            $arrayPizzas[$indice]->_precio = $pizza->_precio;
            $arrayPizzas[$indice]->_cantidad += $pizza->_cantidad;

            return $arrayPizzas;
        }
        array_push($arrayPizzas,$pizza);

        return $arrayPizzas;
    }

    public static function agregarPizza($arrayPizzas,$sabor,$precio, $tipo, $cantidad)
    {
        if($sabor != null && $tipo != null && $precio != null && $cantidad != null)
        {
            $auxPizza = new pizza($sabor,  $precio, $tipo, $cantidad);
            $arrayPizzas = pizza::ActualizarPrecio($arrayPizzas,$auxPizza);              
            return $arrayPizzas;         
        }
        return $arrayPizzas;
    }

    public static function mostarArrayPizzas($arrayPizzas)
    {
        $stringRetorno ="";

        foreach($arrayPizzas as $item)
        {
            $stringRetorno .= Pizza::archivoInfo($item)."\n";
        }     

        return $stringRetorno;
    }
}