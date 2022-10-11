<?php

include_once "pizza.php";

class Archivo
{
    public static function guardarJson($path,$array)
    {
        try
        {
            $retorno = false;
            $archivo = fopen($path,"w"); 

            if($archivo != null)
            {
                $datosJson = json_encode($array);
    
                if($datosJson != null)
                {
                    fwrite($archivo,$datosJson);
                    $retorno = true;
                }
            }
        }
        catch (Exception $e)
        {
            throw new Exception($e);
        }
        finally
        {
            fclose($archivo);
        }


        return $retorno;
    }

    public static function cargarJson($path)
    {
        try
        {
            $arrayPizzas = array();
            $archivo = fopen($path,"r");
    
            if($archivo != null)
            {
                $datosJson= fread($archivo,filesize($path));
    
                if($datosJson != null)
                {
                    $pizzasFromJson = json_decode($datosJson,true);
    
                    foreach ($pizzasFromJson as $pizza)
                    {                   
                       //array_push($arrayPizzas,new Pizza($pizza["_id"],$pizza["_sabor"],$pizza["_precio"],$pizza["_tipo"],$pizza["_cantidad"]));              
                       $arrayPizzas = Pizza::add($arrayPizzas,$pizza["_id"],$pizza["_sabor"],$pizza["_precio"],$pizza["_tipo"],$pizza["_cantidad"]);           
                    }      
                }
            }     
        }
        catch(Exception $e)
        {
            echo $e;
        }
        finally
        {
            fclose($archivo);
            return $arrayPizzas;
        }
        
    }
    
    public static function newID($array)
    {
       if($array != null)
       {
           $id = count($array);
           $id++;
       }
       else
       {
           $id = 1;
       }

       return $id;
    }
}

?>