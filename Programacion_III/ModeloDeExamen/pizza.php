<?php

class Pizza
{
    public $_id;
    public $_sabor;
    public $_precio;
    public $_tipo;
    public $_cantidad;


    public function __construct($id,$sabor,$precio,$tipo,$cantidad)
    {
        $this->setId($id);
        $this->setSabor($sabor);
        $this->setPrecio($precio);
        $this->setTipo($tipo);
        $this->setCantidad($cantidad);
        
    }

    #region setters
    public function setId($value)
    {
        $this->_id = $value; 
    }

    public function setSabor($value)
    {
        $this->_sabor = $value;
    }

    public function setPrecio($value)
    {
        $this->_precio = $value;
    }

    public function setTipo($value)
    {
        $this->_tipo = $value;
    }

    public function setCantidad($value)
    {
        $this->_cantidad = $value;
    }

    #endregion

    #region getters
    public function getId()
    {
        return $this->_id;
    }
    public function getSabor()
    {
        return $this->_sabor;      
    }

    public function getPrecio()
    {
        return $this->_precio;      
    }
    
    public function getTipo()
    {
        return $this->_tipo;    
    }    

    public function getCantidad()
    {
        return $this->_cantidad;
    }

    #endregion

    #region informar

    public static function mostrarUnaPizza($item)
    {
        return $item->_id ." ". $item->_sabor . " " . $item->_precio ." ". $item->_tipo ." ". $item->_cantidad ."\n";
    }

    public static function mostrarArray($array)
    {
        $informacion = "";

        for ($i=0; $i < count($array); $i++) 
        { 
            $informacion .= Pizza::mostrarUnaPizza($array[$i]);
        }
        return $informacion;
    }
    #endregion
    
    #region ABM
    public static function add($array,$id,$sabor,$precio,$tipo,$cantidad)
    {

        if($id != null && $sabor != null && $tipo != null && $precio != null && $cantidad != null)
        {
            $aux = new Pizza($id,$sabor,$precio,$tipo,$cantidad);        
            
            $arrayActualizado = Pizza::actualizarPrecioCantidad($array,$aux);

          
            if($arrayActualizado != null)
            {
                $array = $arrayActualizado;
            }
            else
            {        
                array_push($array,$aux);
            }         
        }  
        return $array;
    }

    #endregion   
   
    #region Validadores
    public function __Equals($item) 
     {
        if(get_class($item) == "Pizza" && $this->getSabor() == $item->getSabor() && $this->getTipo() == $item->getTipo())
        {
            return true;
        }
        return false;
     } 

     public static function pizzaEnArray($array,$pizza)
     {
        if($array != null)
        {
            foreach($array as $item)
            {
                if($item->__Equals($pizza))
                {
                    return true;
                }
            }
        }
        return false;
     }

     public static function pizzaEnArrayIndice($array,$pizza)
     {
        if($array != null)
        {
            for ($i=0; $i < count($array); $i++) 
            { 
                if($array[$i]->__Equals($pizza))
                {
                    return $i;
                }
            }
        }
        return -1;
     }

     public static function actualizarPrecioCantidad($array,$pizza)
     {
        $indice = Pizza::pizzaEnArrayIndice($array,$pizza);

        if($indice > -1)
        {
            $array[$indice]->setPrecio($pizza->getPrecio());
            $array[$indice]->setCantidad($array[$indice]->getCantidad() + $pizza->getCantidad()); 

            return $array;
        }
       return null;       
     }

     public static function newID($array)
     {
        if($array != null)
        {
            $id = count($array);
            $id++;
        }
        else
        {
            $id = 1;
        }

        return $id;
     }
     #endregion
}

