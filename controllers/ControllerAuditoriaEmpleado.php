<?php

require_once MODELS . 'ModelAuditoriaEmpleado.php';
require_once MODELS . 'conexion.php';


class ControllerAuditoriaEmpleado
{
    private $modelAuditoriaEmpleado;
    private $conn;


    public function __construct()
    {
        $this->conn = getDbConnection();
        $this->modelAuditoriaEmpleado = new ModelAuditoriaEmpleado($this->conn);

    }

    public function registrarAuditoriaEmpleado($motivo)
    {
        $this->modelAuditoriaEmpleado->registrarAuditoriaEmpleado($motivo);
    }
}

?>