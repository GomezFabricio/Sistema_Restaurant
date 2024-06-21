<?php

class ModelAuditoriaGeneral
{
    private $conn;
    private $numLegajoResponsable;

    public function __construct($db)
    {
        $this->conn = $db;
        // Inicializar el número de legajo responsable desde la sesión
        $this->numLegajoResponsable = $_SESSION['num_legajo'];
    }

    public function obtenerUltimoIdGenerado()
    {
        $sql = "SELECT MAX(audGen_id) AS ultimo_id FROM auditoria_general";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['ultimo_id'];
        } else {
            return null; 
        }
    }


    public function registrarAuditoriaGeneral()
    {
        // Obtener el último ID generado en auditoria_general
        $audGenId = $this->obtenerUltimoIdGenerado();

        // Registrar el último ID generado en el archivo de registro de errores
        error_log("Último ID generado en auditoria_general: $audGenId");

        $sql = "UPDATE auditoria_general
                SET audGen_num_legajo_responsable = ? 
                WHERE audGen_id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $this->numLegajoResponsable, $audGenId);

        $stmt->execute();
    }
}
