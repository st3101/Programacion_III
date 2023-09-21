<?php

include "../../Biblioteca/Archivo.php";
include "./Alumno.php";
$path = "../misArchivos/alumno.txt";

// $accion;
// $nombre;
// $apellido;
// $legajo;
$arrayAlumnos = Alumno::cargarAlumnos($path);

if(isset($_GET["accion"]))
{
    $accion = $_GET["accion"];

    if($accion == "agregar" && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["legajo"]))
    {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $legajo = $_POST["legajo"];
        
        $arrayAlumnos = Alumno::agregarAlumno($arrayAlumnos,$nombre,$apellido,$legajo);

        if(Alumno::guardarAlumnos($arrayAlumnos,$path))
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
        $arrayAlumnos = Alumno::cargarAlumnos($path);
        if($arrayAlumnos != null)
        {
           echo Alumno::mostrarTodos($arrayAlumnos);
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

}

