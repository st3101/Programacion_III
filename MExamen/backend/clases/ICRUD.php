<?php
interface ICRUD {
    public static function TraerTodos(PDO $conexion);
    public function Agregar();
    public function Modificar();
    public static function Eliminar($id);
}
?>