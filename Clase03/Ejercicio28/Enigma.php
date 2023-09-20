<?php
include "../../Biblioteca/Archivo.php";
class Enigma
{
    static public function Encriptar(string $mensaje,string $path)
    {
        $encriptado = "";
        $retorno = false;

        if($mensaje != null && $path != null)
        {
            for ($i=0; $i < strlen($mensaje); $i++) 
            { 
                $encriptado .= chr(ord($mensaje[$i])+200);
            }

            if($encriptado != null)
            {
                if(Archivo::guardar($encriptado,$path))
                {
                    $retorno = true;
                }
            }
        }

        return $retorno;
    }

    static public function Desencripta(string $path)
    {
        $desecriptado = false;
        $enciptado = "";
        $enciptado = Archivo::cargar($path);

        if($path != null)
        {
            for ($i=0; $i < strlen($enciptado); $i++) 
            { 
                $desecriptado .= chr(ord($enciptado[$i])-200);
            }
        }
        return $desecriptado;
    }
}



?>