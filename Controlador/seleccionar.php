<?php

function seleccionar()
{
    if (isset($_GET['id_producto'])) {
        $consultas = new Consultas();
        $id_producto = $_GET['id_producto'];
        $rows = $consultas->cargarProducto($id_producto);

        foreach ($rows as $row) {
            echo '
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Nombre:</td>
                            <td><input type="text" name="nombre" value="' . $row['nombre'] . '" /></td>
                        </tr>
                        <tr>
                            <td>Descripcion:</td>
                            <td><textarea name="descripcion" cols="30" rows="10">' . $row['descripcion'] . '</textarea></td>
                        </tr>
                        <tr>
                            <td>Categoria:</td>
                            <td><input type="text" name="categoria" value="' . $row['categoria'] . '" /></td>
                        </tr>
                        <tr>
                            <td>Precio:</td>
                            <td><input type="text" name="precio" value="' . $row['precio'] . '" /></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" value="Modificar Producto" /></td>
                        </tr>
                    </table>
                </form>
            ';
        }
    }
}
