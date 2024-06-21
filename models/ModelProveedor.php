<?php
class ModelProveedor
{
    // Propiedad para la conexión a la base de datos
    private $conn;

    // Atributos
    private $prov_id;
    private $prov_nombre;
    private $prov_telefono;
    private $prov_descripcion;

    // Constructor
    public function __construct($data = [], $conn)
    {
        $this->conn = $conn;
        $this->prov_id = $data['prov_id'] ?? null;
        $this->prov_nombre = $data['prov_nombre'] ?? null;
        $this->prov_telefono = $data['prov_telefono'] ?? null;
        $this->prov_descripcion = $data['prov_descripcion'] ?? null;
    }

    // Métodos Getters
    public function getProvId()
    {
        return $this->prov_id;
    }

    public function getProvNombre()
    {
        return $this->prov_nombre;
    }

    public function getProvTelefono()
    {
        return $this->prov_telefono;
    }

    public function getProvDescripcion()
    {
        return $this->prov_descripcion;
    }

    // Métodos Setters
    public function setProvId($prov_id)
    {
        $this->prov_id = $prov_id;
    }

    public function setProvNombre($prov_nombre)
    {
        $this->prov_nombre = $prov_nombre;
    }

    public function setProvTelefono($prov_telefono)
    {
        $this->prov_telefono = $prov_telefono;
    }

    public function setProvDescripcion($prov_descripcion)
    {
        $this->prov_descripcion = $prov_descripcion;
    }

    // Métodos CRUD (Create, Read, Update, Delete)
    public function createProveedor()
    {
        $sql = "INSERT INTO proveedores (prov_nombre, prov_telefono, prov_descripcion) 
                    VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sss", $this->prov_nombre, $this->prov_telefono, $this->prov_descripcion);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function readProveedor($prov_id)
    {
        $sql = "SELECT * FROM proveedores WHERE prov_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $prov_id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function updateProveedor()
    {
        $sql = "UPDATE proveedores SET prov_nombre = ?, prov_telefono = ?, prov_descripcion = ? WHERE prov_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sssi", $this->prov_nombre, $this->prov_telefono, $this->prov_descripcion, $this->prov_id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProveedor()
    {
        $sql = "DELETE FROM proveedores WHERE prov_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("i", $this->prov_id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function showAllProveedores()
    {
        $sql = "SELECT * FROM proveedores";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $result = $stmt->get_result();

        $proveedores = [];

        if ($result->num_rows > 0) {
            while ($proveedor = $result->fetch_assoc()) {
                $proveedores[] = $proveedor;
            }
        }

        return $proveedores;
    }
}
