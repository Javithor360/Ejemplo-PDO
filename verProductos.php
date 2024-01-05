<?php
require_once('./Modelo/class.conexion.php');
require_once('./Modelo/class.consultas.php');
require_once('./Controlador/cargar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ver productos</title>
</head>

<body>
    <h1>MIS PRODUCTOS</h1>
    <?php cargar(); ?>

    <div>
        <a href="./insertar.html">Agregar un nuevo producto</a>
    </div>
</body>

</html>