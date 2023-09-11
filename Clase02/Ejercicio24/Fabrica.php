<?php 


namespace a;
class Fabrica
{
    
    private int $_cantMaxOperarios;
    private $_operarios = array();
    private string $_razonSocial;

    private array $a;
    public function __construct(string $rs)
    {
        $this->_razonSocial = $rs;
        $this->_cantMaxOperarios = 5;        
    }

    public function add(Operario $op):bool
    {
        $retorno = false;

        if($op != null &&  $this->equals($this,$op) && $this->_cantMaxOperarios >= count($this->_operarios)) 
        {
            if(array_push($this->_operarios,$op))
            {
                $retorno = true;
            } 
        }

        return $retorno;
    }

    public function equals(Fabrica $fb, Operario $op):bool
    {
        $retorno = false;
        if($fb != null && $op != null)
        {
            foreach ($fb->_operarios as $value) 
            {
                if(Operario::equals($value,$op))
                {
                    $retorno =  true;
                    break;
                }
            }
            if(count($fb->_operarios) == 0)
            {
                $retorno =  true;     
            }
            
        }
        return $retorno;
    }

    public function mostrar():string
    {
        return "Razon Social: ".$this->_razonSocial ." - Cantidad Max Operarios: ".$this->_cantMaxOperarios." Operarios: ".$this->mostrarOperarios();
    }

    public static function mostrarCosto(Fabrica $fb):void
    {
        echo "Los costos son: ".$fb->retornarCostos();
    }

    private function mostrarOperarios():string
    {
        $text = "";
        foreach ($this->_operarios as $value) 
        {
            $text .= $value->mostrarStatic()."\n";
        }

        return $text;
    }

    public function remove(Operario $op)
    {

    }

    private function retornarCostos():float
    {
        $costoTotal = 0;
        foreach ($this->_operarios as $value) 
        {
            $costoTotal += $value->getSalario();
        }
        return $costoTotal;
    }
}




