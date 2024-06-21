<?php
function getDbConnection()
{
    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "restaurante2";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Configurar el juego de caracteres a UTF-8
    $conn->set_charset("utf8mb4");

    return $conn;
}
