<?php

require_once MODELS . 'ModelAuditoriaGeneral.php';

class ModelAuditoriaEmpleado
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function registrarAuditoriaEmpleado($motivo)
    {
        // Crear una instancia del modelo AuditoriaGeneral
        $modelAuditoriaGeneral = new ModelAuditoriaGeneral($this->db);

        //Cargar el id del responsable en auditoria_general
        $modelAuditoriaGeneral->registrarAuditoriaGeneral();

        // Obtener el último ID generado en auditoria_general
        $ultimoAudGenId = $modelAuditoriaGeneral->obtenerUltimoIdGenerado();

        // SQL para la modificacion
        $sql = "UPDATE auditoria_empleados SET audEmp_motivo = ? WHERE audGen_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("si", $motivo, $ultimoAudGenId);
        $stmt->execute();
    }
}
