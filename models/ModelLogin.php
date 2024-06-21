<?php

class ModelLogin
{
    // Propiedad para la conexión a la base de datos
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUser($dni, $password)
    {
        // Preparar la consulta SQL para evitar SQL Injection
        $sql = "SELECT e.emp_dni, u.user_pass, e.emp_nombre, e.emp_num_legajo, e.emp_apellido FROM empleados e 
                INNER JOIN usuarios u ON e.emp_num_legajo = u.emp_num_legajo 
                WHERE e.emp_dni = ?";

        // Preparar la declaración
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la declaración: " . $this->conn->error);
        }

        // Vincular parámetros
        $stmt->bind_param("s", $dni);

        // Ejecutar la declaración
        $stmt->execute();

        // Obtener el resultado
        $result = $stmt->get_result();

        // Verificar si hubo un error en la consulta
        if (!$result) {
            die("Error en la ejecución de la declaración: " . $stmt->error);
        }

        // Verificar si se encontró el usuario
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verificar la contraseña directamente sin password_verify
            if ($password === $row['user_pass']) {
                return $row;
            } else {
                error_log("Password verification failed.");
            }
        }

        return false;
    }
}
