<?php
class ModelRolEmpleado
{
    // Propiedad para la conexión a la base de datos
    private $conn;

    // Atributos
    private $rol_id;
    private $rol_empleado;

    // Constructor
    public function __construct($data = [], $conn)
    {
        $this->conn = $conn;
        $this->rol_id = $data['rol_id'] ?? null;
        $this->rol_empleado = $data['rol_empleado'] ?? null;
    }

    // Métodos Getters
    public function getRolId()
    {
        return $this->rol_id;
    }

    public function getRolRol()
    {
        return $this->rol_empleado;
    }

    // Métodos Setters
    public function setRolId($rol_id)
    {
        $this->rol_id = $rol_id;
    }

    public function setRolRol($rol_empleado)
    {
        $this->rol_empleado = $rol_empleado;
    }

    // Método para obtener todos los roles
    public function getAllRoles()
    {
        $sql = "SELECT rol_id, rol_empleado FROM rol_empleado";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        $roles = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $roles[] = $row;
            }
        }

        return $roles;
    }
}
