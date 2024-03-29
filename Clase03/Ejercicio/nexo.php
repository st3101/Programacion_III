<?php

use Leonardi\Alumno;
include "../../Biblioteca/Archivo.php";
include "./Alumno.php";
$path = "./archivos/alumnos.txt";

$arrayAlumnos = Alumno::cargarAlumnos($path);

if($arrayAlumnos == null){
    Archivo::crearArchivo($path);
}

switch($_GET["accion"]){
    case "agregar":
        $arrayAlumnos = Alumno::agregarAlumno($arrayAlumnos,$_POST["nombre"],$_POST["apellido"],$_POST["legajo"]);
        if(Alumno::guardarAlumnos($arrayAlumnos,$path)){
            echo "Se guardo";
        }
        else{
            echo "no se guardo";
        }
    break;

    case "listar":
        $arrayAlumnos = Alumno::cargarAlumnos($path);
        if($arrayAlumnos != null){
           echo Alumno::mostrarTodos($arrayAlumnos);
        }
    break;

    case "verificar":
        if(-1 <  Alumno::buscarAlumno($arrayAlumnos,$_POST["legajo"])){    
            echo "El alumno con el legajo '". $_POST["legajo"]."' se encuentra en el listado";
        }
        else{
            echo "El alumno con el legajo '". $_POST["legajo"]."' NO se encuentra en el listado.\n";
        }
    break;

    case "modificar":
        $alumno = new Alumno($_POST["nombre"],$_POST["apellido"],$_POST["legajo"]);
        if($alumno != null){
            if(Alumno::modificarAlumno($arrayAlumnos,$alumno)){
                Alumno::guardarAlumnos($arrayAlumnos,$path);
                echo "Se guardo y ";
            }
            else{
                echo "No se modifico";
            }
        }
    break;

    case "borrar":
        $mensaje = "Error";
        $bufferArrayAlumnos = Alumno::borrarUnAlumno($arrayAlumnos,$_POST["legajo"]);
        if($bufferArrayAlumnos != null){
            if(Alumno::guardarAlumnos($bufferArrayAlumnos,"../misArchivos/alumno.txt")){
                $mensaje = "Se borro y se guardo correctamente";
            }
        }
        echo $mensaje;
        break;
    default:
        "Error en accion";
    break;
    
}


