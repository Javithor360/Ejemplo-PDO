<?php
/* 
    La clase "Conexion" contiene la función "get_conexion",
    la cual permite establecer la conexión con la base de datos
    por medio de la instancia "PDO" que recibe los parámetros de las
    variables definidas
*/

class Conexion
{
    public function get_conexion()
    {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "ejemplo_pdo";
        $conexion = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
        return $conexion; // Se retorna el valor de la conexión
    }
}
