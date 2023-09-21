<?php

class Archivo
{
    static public function guardar(string $texto, string $path)
    {
        $retorno = false;
        if($texto != null && $path != null)
        {
            $archivo = fopen($path, "w");
            if($archivo != null)
            {
                if(fwrite($archivo,$texto))
                {
                    $retorno = true;
                }
            }
            fclose($archivo);
        }
        return $retorno;
    }
    static public function guardarA(string $texto, string $path)
    {
        $retorno = false;
        if($texto != null && $path != null)
        {
            $archivo = fopen($path, "a");
            if($archivo != null)
            {
                if(fwrite($archivo,$texto))
                {
                    $retorno = true;
                }
            }
            fclose($archivo);
        }
        return $retorno;
    }


    static public function cargar($path)
    {
        $retorno = false;
        if($path != null)
        {
            $archivo = fopen($path,"r");

            if($archivo != null)
            {
                $texto = stream_get_contents($archivo);

                if($texto != null)
                {
                    $retorno = $texto;
                }
            }
        }
        return $retorno;
    }
}