<?php

include "../../Biblioteca/Archivo.php";
include "./Alumno.php";
$path = "../misArchivos/alumno.txt";

$arrayAlumnos = Alumno::cargarAlumnos($path);

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
        if(isset($_POST["legajo"])){
            $legajo = $_POST["legajo"];                
            if(Alumno::buscarAlumno($arrayAlumnos,$legajo)){
                echo "El alumno con el legajo '". $legajo."' se encuentra en el listado";
            }
            else{
                echo "El alumno con el legajo '". $legajo."' NO se encuentra en el listado";
            }
    }
}

