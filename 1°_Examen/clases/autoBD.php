<?php

namespace Leonardi\Santiago;

class AutoBD extends Auto implements IParte1
{
    protected $pathFoto;

    public function __construct($patente = '', $marca = '', $color = '', $precio = 0.0, $pathFoto = '')
    {
        parent::__construct($patente, $marca, $color, $precio);
        $this->pathFoto = $pathFoto;
    }

    public function getPathFoto()
    {
        return $this->pathFoto;
    }

    public function setPathFoto($pathFoto)
    {
        $this->pathFoto = $pathFoto;
    }

    public static function ConexionSql()
    {
        return new PDO("mysql:host=localhost;dbname=garage_bd","root","");
    }
    public function toJSON()
    {
        $data = [
            'patente' => $this->getPatente(),
            'marca' => $this->getMarca(),
            'color' => $this->getColor(),
            'precio' => $this->getPrecio(),
            'pathFoto' => $this->getPathFoto(),
        ];

        return json_encode($data);
    }

    public static function Agregar(){
        try {
            $patente = $this->getPatente();
            $marca = $this->getMarca();
            $color = $this->getColor();
            $precio = $this->getPrecio();
            $pathFoto = $this->getPathFoto();

            $conexion = AutoBD::ConexionSql();
            $consulta = $conexion->prepare("INSERT INTO autos (patente, marca, color, precio, foto) VALUES (:patente, :marca, :color, :precio, :foto)");

            //Bind de los valores de los atributos a los marcadores de posición
            $consulta->bindParam(":patente",$patente);
            $consulta->bindParam(":marca",$marca);
            $consulta->bindParam(":color",$color);
            $consulta->bindParam(":precio",$precio);
            $consulta->bindParam(":foto",$pathFoto);

            
            // Ejecutar la consulta SQL
            $exito = $consulta->execute();

            return $exito;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    

    public static function traer()
    {
        try {
            // Preparar la consulta SQL para obtener usuarios con descripción de perfil
            $consulta = $conexion->prepare("SELECT `patente`, `marca`, `color`, `precio`, `foto` FROM `autos`");

            // Ejecutar la consulta SQL
            $consulta->execute();

            // Obtener los resultados como objetos Usuario
            $autos = array();
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $auto = new AutosBD(
                    $fila['patente'],
                    $fila['marca'],
                    $fila['color'],
                    $fila['precio'],
                    $fila['foto'],
                );
                $autos[] = $auto;
            }

            return $autos;
        } catch (PDOException $e) {
            // Manejar cualquier excepción que pueda ocurrir durante la consulta
            // Puedes agregar registro de errores o realizar cualquier otra acción necesaria aquí
            echo $e->getMessage(); //Muestro el error
            return array(); // Retornar un array vacío en caso de error
        }
    }
}
