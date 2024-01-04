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

    public function getProductos() {
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
}