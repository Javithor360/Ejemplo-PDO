<?php

require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consultas.php');

$mensaje = null;

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];

if (strlen($nombre) > 0 && strlen($descripcion) > 0 && strlen($categoria) > 0 && strlen($precio) > 0) {
    $consultas = new Consultas();
    $mensaje = $consultas->insertarProducto($nombre, $descripcion, $categoria, $precio);
    echo "<a href='../insertar.html'>Nuevo producto</a><hr />";
} else {
    echo "Debes ingresar todos los campos...";
}

echo $mensaje;
