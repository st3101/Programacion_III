<?php

class Operario
{
    private string $_apellido;
    private int $_legajo;
    private string $_nombre;
    private float $_salario;

    public function  __construct(int $legajo, string $apellido, string $nombre, float $salario)
    {
        $this->_legajo = $legajo;
        $this->_apellido = $apellido;
        $this->_nombre = $nombre;
        $this->_salario = $salario;
    }

    public static function equals(Operario $op1, Operario $op2):bool
    {
        if($op1->_legajo == $op2->_legajo && $op1->_apellido == $op2->_apellido && $op1->_nombre == $op2->_nombre)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getNombreApellido()
    {
        return $this->_apellido . ", " . $this->_nombre;
    }
    public function getSalario()
    {
        return $this->_salario;
    }

    public function mostrarStatic():string
    {
        return $this->getNombreApellido(). " - " . $this->_legajo . " - " . $this->getSalario();
    }
    public static function mostrar(Operario $Op):string
    {
        return $Op->mostrarStatic();
    }
    public function setAumentarSalario(float $aumento):void
    {
        $aumentoTotal = ($this->_salario * $aumento) / 100;
        $this->_salario = $this->_salario + $aumentoTotal;
    }
}





