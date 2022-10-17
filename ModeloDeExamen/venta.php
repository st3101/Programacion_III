<?php
/*
a- (1 pts.) AltaVenta.php: (por POST)se recibe el email del usuario y el sabor,tipo y cantidad ,si el ítem existe en
Pizza.json, y hay stock guardar en la base de datos( con la fecha, número de pedido y id autoincremental ) y se
debe descontar la cantidad vendida del stock .
*/
include_once "pizza.php";

class venta
{
    public $_mail;
    public $_usuario;
    public $_fecha;
    public $_numeroDePedido;
    public $_pizzaSabor;
    public $_pizzaTipo;
    public $_pizzaCantidad;

    public function __construct($usuario,$mail,$pizza,$fecha)
    {
        $this->setUsuario($usuario);
        $this->setMail($mail);
        $this->setNumeroDePedido(rand(0,999));
        $this->setFecha($fecha);
        $this->setPizzaSabor($pizza->getSabor());
        $this->setPizzaTipo($pizza->getTipo());
        $this->setPizzaCantidad($pizza->getCantidad());
    }

    #region setters
    public function setMail($mail)
    {
        $this->_mail = $mail;
    }

    public function setUsuario($usuario)
    {
        $this->_usuario = $usuario;
    }

    public function setNumeroDePedido($numeroDePedido)
    {
        $this->_numeroDePedido = $numeroDePedido;
    }

    public function setFecha($fecha)
    {
        $this->_fecha = $fecha;
    }

    public function setPizzaSabor($sabor)
    {
        $this->_pizzaSabor = $sabor;
    }

    public function setPizzaTipo($tipo)
    {
        $this->_pizzaTipo = $tipo;
    }

    public function setPizzaCantidad($cantidad)
    {
        $this->_pizzaCantidad = $cantidad;
    }
    #endregion

    #region getters
    public function getUsuario()
    {
        return $this->_usuario;
    }
    public function getMail()
    {
        return $this->_mail;
    }
    public function getNumeroDePedido()
    {
        return $this->_numeroDePedido;
    }
    public function getFecha()
    {
        return $this->_fecha;
    }
    public function getPizzaSabor()
    {
        return $this->_pizzaSabor;
    }
    public function getPizzaTipo()
    {
        return $this->_pizzaTipo;
    }
    public function getPizaaCantidad()
    {
        return $this->_pizzaCantidad;
    }
    #endregion

    #region conexion
    public function subirVenta($conexion)
    {
        //Sin seguridad a inyeccion sql
        //$conexion = conexion::dameUnObjetoAcceso();

        $consulta = $conexion->RetornarConsulta("INSERT into venta (fecha, numeroDePedido)
        values('$this->_fecha','$this->_numeroDePedido')");

        $consulta->execute();

        //echo $conexion->RetornarUltimoIdInsertado();
        
    }

    public function subirVenta2($conexion)
    {
            $sql = ("INSERT into venta (fecha, numeroDePedido)
            values('$this->_fecha','$this->_numeroDePedido')");

            $query = $conexion->getQuery($sql);
            $query->bindValue(':fecha', $this->getFecha(), PDO::PARAM_STR);
            $query->bindValue(':numeroDePedido', $this->getNumeroDePedido(), PDO::PARAM_INT);
            $query->execute();

            echo $conexion->RetornarUltimoIdInsertado();

            return $conexion->ReturnLastIDInserted();
    }
    #endregion

    #region arrays
    static function contarVentas($array):int
    {
        $totalVentas = 0;
        foreach($array as $item)
        {
            $totalVentas += $item->getPizaaCantidad();
        }
        return $totalVentas;
    }
    #endregion

    #region informar

    public static function informarArrayVentas($array):string
    {
        $text = "";
        foreach($array as $item)
        {
            $text .= $item->getNumeroDePedido() . " " . $item->getUsuario() . " " . $item->getPizzaSabor() . " " . $item->getPizaaCantidad()." ". $item->getFecha() ."\n";
        }
        return $text;
    }

    public static function informarEntreFechaOrdenadoSabor($fechaInicio,$fechaFinal,$array)
    {
        $arrayAux = array();

        if($array != null)
        {
            foreach($array as $item)
            {
                if(strtotime($item->getFecha()) >= strtotime($fechaInicio) && strtotime($item->getFecha()) <= strtotime($fechaFinal))
                {
                    echo"hola.\n";
                    array_push($arrayAux,$item);
                }
            }
            if($arrayAux != null)
            {
                usort($arrayAux,"Validadores::ordenarPorAlfabeto");    
            }
        }
        return $arrayAux;
    }
    #endregion

}




?>