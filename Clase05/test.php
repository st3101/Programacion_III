<?php

$opciones = $_POST["opcion"];

switch($opciones)
{
    case "conexion":
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=mi_base","root","");
            echo "Se conecto";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;
    case "listar":
        try {
            require_once "mi_tabla.php";

           $pdo = new PDO("mysql:host=localhost;dbname=mi_base","root","");
           $sql = $pdo->query("SELECT * from mi_tabla");
           if($sql != null){
           
           /* while ($res = $sql->fetchObjet("mi_tabla")) {
               echo $res->toString();
            }
            */
           }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        break;
    case "agregar":
        break;
    case "eliminar":
        break;
    default:
        echo "Que pusiste capo?";
        break;
}