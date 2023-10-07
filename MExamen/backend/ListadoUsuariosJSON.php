<?php

// Incluye la definición de la clase Usuario
require_once('./clases/Usuario.php'); // Ajusta la ruta según la estructura de tu proyecto
require_once('./clases/Conexion.php');

// Conecta a la base de datos si es necesario

$conexion = Conexion::UnaConexion();
// Llama al método de clase TraerTodos() para obtener todos los usuarios
$usuarios = Usuario::TraerTodos($conexion); // Asegúrate de tener la conexión configurada

// Convierte el array de objetos Usuario en formato JSON
$usuariosJson = json_encode($usuarios);

// Devuelve la respuesta JSON
echo $usuariosJson;

?>