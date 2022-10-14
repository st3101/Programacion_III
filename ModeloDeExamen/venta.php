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

    public function __construct($usuario,$mail,$pizza)
    {
        $this->setUsuario($usuario);
        $this->setMail($mail);
        $this->setNumeroDePedido(rand(0,999));
        $this->setFecha(Date('d,m,Y h:i:s'));
        $this->setPizzaSabor($pizza->getSabor());
        $this->setPizzaTipo($pizza->getTipo());
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

}




?>