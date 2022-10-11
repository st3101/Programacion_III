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
    public $_pizzaSabor;
    public $_pizzaTipo;
    public $_pizzaCantidad;

    public function __construct($usuario,$mail,$pizza)
    {
        $this->setUsuario($usuario);
        $this->setMail($mail);
        $this->setFecha();
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

    public function setFecha($fecha = Date('d,m,Y h:i:s'))
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

    #endregion
}




?>