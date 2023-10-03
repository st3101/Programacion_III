<?php

class Archivo
{
    static public function guardar2(string $texto, string $path)
    {
        $retorno = true;
        if($texto != null && $path != null)
        {
            $archivo = fopen($path, "a+");
            if($archivo != null)
            {
                if(fwrite($archivo,$texto))
                {
                    $retorno = true;
                }
            } 
        }
        return $retorno;
    }
}