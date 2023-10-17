<?php

namespace Leonardi\Santiago;
// Incluimos la clase AutoBD
require_once 'clases/autoBD.php';

require_once "clases/auto.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $autos = AutoBD::traer();
    
    // Verificar si se obtuvieron autos
    if ($autos !== false) {
        // Crear una tabla HTML para mostrar los autos
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Patente</th>';
        echo '<th>Marca</th>';
        echo '<th>Color</th>';
        echo '<th>Precio</th>';
        echo '<th>Foto</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($autos as $auto) {
            echo '<tr>';
            echo '<td>' . $auto->getPatente() . '</td>';
            echo '<td>' . $auto->getMarca() . '</td>';
            echo '<td>' . $auto->getColor() . '</td>';
            echo '<td>' . $auto->getPrecio() . '</td>';
            echo '<td> <img src= ' . $auto->getPathFoto().'>'.'</td>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {

        echo 'No se pudieron obtener los autos de la base de datos.';
    }
} else {
    echo 'Se esperaba una solicitud GET.';
}