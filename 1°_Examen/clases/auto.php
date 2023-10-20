<?php

namespace Leonardi\Santiago;

class Auto
{
    protected $patente;
    protected $marca;
    protected $color;
    protected $precio;

    public function __construct($patente, $marca, $color, $precio)
    {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->color = $color;
        $this->precio = $precio;
    }
    // Métodos getter y setter para los atributos protegidos
    public function getPatente()
    {
        return $this->patente;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public static function MostrarTodo($array)
    {
        $retorno = "";
        if($array != null)
        {
            foreach ($array as $item) {
                $retorno.= "Patente: ".$item->getPatente()
                ."Marca: ".$item->getMarca()
                ."Color: ".$item->getColor()
                ."Precio: ".$item->getPrecio()."\n";
            }
        }
        return $retorno;
    }
    public function ToJSON(){
        // Método para convertir los datos en formato JSON
        $array = array(
            "patente" => $this->patente,
            "marca" => $this->marca,
            "color" => $this->color,
            "precio" => $this->precio
        );
    }
    
    public function guardarJSON($rutaArchivo){
        // Crear un arreglo con los datos del usuario
        $array = array(
            "patente" => $this->patente,
            "marca" => $this->marca,
            "color" => $this->color,
            "precio" => $this->precio
        );
        
        // Leer el contenido actual del archivo JSON
        $usuariosExistente = [];
        if (file_exists($rutaArchivo)) {
            $contenidoArchivo = file_get_contents($rutaArchivo);
            $usuariosExistente = json_decode($contenidoArchivo, true);
        }
    
        // Agregar el nuevo usuario al arreglo existente
        $usuariosExistente[] = $array;
    
        // Convertir el arreglo de usuarios a formato JSON
        $usuariosJson = json_encode($usuariosExistente, JSON_PRETTY_PRINT);
    
        // Escribir el JSON en el archivo
        if (file_put_contents($rutaArchivo, $usuariosJson)) {
            // Éxito al guardar el usuario
            return json_encode(array(
                'exito' => true,
                'mensaje' => 'guardado con éxito.'
            ));
        } else {
            // Error al guardar el usuario
            return json_encode(array(
                'exito' => false,
                'mensaje' => 'Error al guardar en el archivo.'
            ));
        }
    }
    public static function TraerJSON($rutaArchivo){

        // Verificar si el archivo existe
        if (file_exists($rutaArchivo)) {
            // Leer el contenido del archivo JSON
            $contenidoArchivo = file_get_contents($rutaArchivo);
        }
        return $contenidoArchivo;
    }
    public static function verificarAutoJSON($patente)
    {
        // Obtener la lista de autos desde el archivo JSON
        $archivoJSON = './archivos/autos.json';
        $autos = [];
    
        if (file_exists($archivoJSON)) {
            $autosJson = json_decode(file_get_contents($archivoJSON), true);
        }
        $autos = array();
        foreach ($autosJson as $item) {
            $auto = new Auto(
                $item['patente'],
                $item['marca'],
                $item['color'],
                $item['precio']
            );
            $autos[] = $auto;
        }
        // Buscar el auto con la patente especificada en el array
        foreach ($autos as $autoData) {
            if ($autoData->getPatente() == $patente) {
                // Si se encuentra el auto, retornar un JSON con éxito true y un mensaje
                return json_encode(['existe' => true, 'mensaje' => 'Auto encontrado']);
            }
        }
    
        // Si no se encuentra el auto, retornar un JSON con éxito false y un mensaje
        return json_encode(['existe' => false, 'mensaje' => 'Auto no encontrado']);
    }
    
}
?>