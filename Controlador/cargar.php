<?php

function cargar()
{
    $consultas = new Consultas();
    $rows = $consultas->getProductos();

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Categoria</th>";
    echo "<th>Precio</th>";
    echo "</tr>";
    foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_producto'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "<td>" . $row['categoria'] . "</td>";
        echo "<td>" . $row['precio'] . "</td>";
        echo "<td><a href='./modificar.php?id_producto=" . $row['id_producto'] . "'>Modificar</td>";
        echo "<td><a href='./Controlador/eliminar.php?id_producto=" . $row['id_producto'] . "'>Eliminar</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function buscar($busqueda)
{
    $consultas = new Consultas();
    $rows = $consultas->buscarProductos($busqueda);

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripcion</th>";
    echo "<th>Categoria</th>";
    echo "<th>Precio</th>";
    echo "</tr>";
    if (isset($rows)) {
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_producto'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['categoria'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td><a href='./modificar.php?id_producto=" . $row['id_producto'] . "'>Modificar</td>";
            echo "<td><a href='./Controlador/eliminar.php?id_producto=" . $row['id_producto'] . "'>Eliminar</td>";
            echo "</tr>";
        }
    } else {
        echo "No se encontraron resultados";
    }
    echo "</table>";
}
