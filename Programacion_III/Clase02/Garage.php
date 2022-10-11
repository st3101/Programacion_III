<?php
include "auto.php";
class garaje
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_auto;

    public function __construct($razonSocial,$precioPorHora="",$auto=array())
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_auto = $auto;
    } 

    public function MostrarGarage()
    {
        return $this->_razonSocial ." - ". $this->_precioPorHora ." - ". $this->MostarTodosAutos();     
    }
    
    public function MostarTodosAutos()
    {
        $texto=" ";

        foreach($this->_auto as $item)
        {
           $texto = $texto ."<br/>". auto::MostrarAuto($item);
        }

        return $texto;
    }

    //Testear
    public function Equals($auto)
    {
        foreach($this->_auto as $item)
        {
            if($item == $auto)
            {
                return true;
            }
        }
        return false;
    }

    public function Add($auto)
    {
        
        if(!($this->Equals($auto)))
        {         
            array_push($this->_auto,$auto);
            
            return true;
        }

        return false;
    }

    public function Remove($auto)
    {   
          $indice = $this->BuscarInice($auto); 

          if($indice >= 0)
          {
            unset($this->_auto[$indice],$auto);
          }     
    }

    public function BuscarInice($auto)
    {
       for($i=0; $i<count($this->_auto);$i++)
       {
            if($this->_auto[$i] == $auto)
            {
                return $i;
            }
       }
        return 0;
    }


}
?>