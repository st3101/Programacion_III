<?php

include "../../Biblioteca/Archivo.php";
$path = "../misArchivos/alumno.txt";

$accion;
$nombre;
$apellido;
$legajo;

if(isset($_GET["accion"]))
{
    $accion = $_GET["accion"];

    if($accion == "agregar" && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["legajo"]))
    {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $legajo = $_POST["legajo"];

        $formatoTexto = $legajo."-".$apellido."-".$nombre."\n";
    
        if(Archivo::guardarA($formatoTexto,$path))
        {
            echo "Se guardo";
        }
        else
        {
            echo "no se guardo";
        }
    }
    else if($accion == "listar")
    {
        $alumno = Archivo::cargar($path);

        if($alumno != null)
        {
            echo $alumno;
            /*
            $arrayAlumno = explode("-",$alumno);          
            $legajo = $arrayAlumno[0];
            $apellido = $arrayAlumno[1];
            $nombre = $arrayAlumno[2];
            */
        }
    }
    else if($accion == "verificar")
    {
        if(isset($_POST["legajo"]))
        {
            $flag = false;
            $legajo = $_POST["legajo"];
            $alumno = Archivo::cargar($path);

            if($alumno != null)
            {             
                $arrayAlumno = explode("\n",$alumno);   

                for ($i=0; $i < count($arrayAlumno); $i++) 
                { 
                    //echo $arrayAlumno[$i];
                    $arrayDatosAlumno = explode("-",$alumno);  

                    if($legajo == $arrayDatosAlumno[0])
                    {
                        $flag = true;
                        break;
                    }                
                }
                
                if($flag == true)
                {
                    echo "El alumno con el legajo '". $legajo."' se encuentra en el listado";
                }
                else
                {
                    echo "El alumno con el legajo '". $legajo."' NO se encuentra en el listado";
                }
            }
        }
    }
    else if($accion == "verificar")
    {
        
    }

    function buscarIndice($path,$legajo)
    {
        $retorno = 0;
        if(isset($_POST["legajo"]))
        {
            $alumno = Archivo::cargar($path);

            if($alumno != null)
            {             
                $arrayAlumno = explode("\n",$alumno);   

                for ($i=0; $i < count($arrayAlumno); $i++) 
                { 
                    $arrayDatosAlumno = explode("-",$alumno);  

                    if($legajo == $arrayDatosAlumno[0])
                    {
                        $retorno = $arrayDatosAlumno;
                        break;
                    }                
                }
                
            }
        }
        return $retorno;
    }
}

