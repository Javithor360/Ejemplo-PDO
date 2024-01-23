<?php

require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consultas.php');

$msj = null;
$consultas = new Consultas();
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$id_producto = $_POST['id_producto'];

if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($categoria) > 0 && strlen($precio) > 0) {
    $msj = $consultas->modificarProducto("nombre", $nombre, $id_producto);
    $msj = $consultas->modificarProducto("descripcion", $descripcion, $id_producto);
    $msj = $consultas->modificarProducto("categoria", $categoria, $id_producto);
    $msj = $consultas->modificarProducto("precio", $precio, $id_producto);
    echo $msj;
    echo "<div><a href='../verProductos.php'>Ver productos</a></div>";
} else {
    echo "Por favor, completa todos los campos...";
}
