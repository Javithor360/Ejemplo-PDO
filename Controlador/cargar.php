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
        echo "</tr>";
    }
    echo "</table>";
}
