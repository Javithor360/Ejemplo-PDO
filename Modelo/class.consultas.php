<?php

/*
    La clase "Consultas" contiene las funciones para gestionar la base de datos
*/

class Consultas
{
    /*
        - La función "inserProducto" permite añadir nuevos datos a la base de datos
        y para ello recibe los parámetros que se guardarán.

        - Se hace uso de la instancia "Conexion" creada en el Modelo de conexión,
        de cual se obtiene la funcion "get_conexion" para identificar el lugar
        donde de registrarán los datos.

        - La variable "query" contiene la sentencia SQL con la cual determinamos los campos
        que vamos a guardar y sus respectivos valores (sin pasarle las variables para evitar
        SQL Injections).

        - Posteriormente se utiliza la función "prepare" con el argumento de la variable "query"
        para empezar a enviar los datos obtenidos de manera segura con la función "bindParam".

        - Finalmente se verifica si el statement se creó correctamente y se ejecuta.
    */
    public function insertarProducto($nombre, $descripcion, $categoria, $precio)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $query = "INSERT INTO productos (nombre, descripcion, categoria, precio) values (:nombre, :descripcion, :categoria, :precio)";
        $statement = $conexion->prepare($query);
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":descripcion", $descripcion);
        $statement->bindParam(":categoria", $categoria);
        $statement->bindParam(":precio", $precio);

        if (!$statement) {
            return "Error al crear la consulta";
        } else {
            $statement->execute();
            return "Registro creado correctamente";
        }
    }

    public function getProductos()
    {
        $rows = null;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $query = "SELECT * FROM productos";
        $statement = $conexion->prepare($query);
        $statement->execute();

        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }

        return $rows;
    }

    public function eliminarProducto($id_producto)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $query = "DELETE FROM productos WHERE id_producto = :id_producto";
        $statement = $conexion->prepare($query);
        $statement->bindParam(":id_producto", $id_producto);

        if (!$statement) {
            return "Error al eliminar producto";
        } else {
            $statement->execute();
            return "Producto eliminado correctamente";
        }
    }

    public function buscarProductos($busqueda)
    {
        $rows = null;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $nombre = "%" . $busqueda . "%";
        $query = "SELECT * FROM productos WHERE nombre LIKE :nombre";
        $statement = $conexion->prepare($query);
        $statement->bindParam(":nombre", $nombre);
        $statement->execute();

        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }

        return $rows;
    }

    public function cargarProducto($id_producto)
    {
        $rows = null;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $query = "SELECT * FROM productos WHERE id_producto = :id_producto";
        $statement = $conexion->prepare($query);
        $statement->bindParam(":id_producto", $id_producto);
        $statement->execute();

        while ($result = $statement->fetch()) {
            $rows[] = $result;
        }

        return $rows;
    }

    public function modificarProducto($field, $valor, $id_producto)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $query = "UPDATE productos SET $field = :valor WHERE id_producto = :id_producto";
        $statement = $conexion->prepare($query);
        $statement->bindParam(":valor", $valor);
        $statement->bindParam(":id_producto", $id_producto);

        if (!$statement) {
            return "Error al modificar el producto";
        } else {
            $statement->execute();
            return "Producto modificado correctamente";
        }
    }
}
