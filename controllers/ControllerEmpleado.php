<?php

include_once MODELS . 'conexion.php';
include_once MODELS . 'ModelEmpleado.php';
include_once MODELS . 'ModelRolEmpleado.php';
include_once CONTROLLERS . 'ControllerAuditoriaEmpleado.php';
include_once CONTROLLERS . 'ControllerValidacion.php';

class ControllerEmpleado
{

    private $conn;
    private $validador;
    private $ctrAuditoria;

    public function __construct()
    {
        // Asignar la conexión establecida en conexion.php a $this->conn
        $this->conn = getDbConnection();
        $this->validador = new ControllerValidacion();
        $this->ctrAuditoria = new ControllerAuditoriaEmpleado();
    }

    public function index($message = null)
    {
        $empleadoModel = new ModelEmpleado([], $this->conn);
        $empleados = $empleadoModel->showAllEmpleados();
        include_once VIEWS . 'empleados/ViewIndexEmpleado.php';
        
        // Limpia la URL
        echo '<script>
                if (window.history.replaceState) {
                    let cleanUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                    window.history.replaceState(null, null, cleanUrl);
                }
            </script>';
    }

    public function collectFormData()
    {
        $empleadoData = [
            'emp_nombre' => $_POST['emp_nombre'] ?? null,
            'emp_apellido' => $_POST['emp_apellido'] ?? null,
            'emp_dni' => $_POST['emp_dni'] ?? null,
            'emp_fecha_inicio' => $_POST['emp_fecha_inicio'] ?? null,
            'emp_domicilio' => $_POST['emp_domicilio'] ?? null,
            'emp_contacto' => $_POST['emp_contacto'] ?? null,
            'emp_email' => $_POST['emp_email'] ?? null,
            'emp_fecha_nac' => $_POST['emp_fecha_nac'] ?? null,
            'rol_id' => $_POST['rol_id'] ?? null,
            'emp_num_legajo' => $_POST['emp_num_legajo'] ?? null,
        ];
        return $empleadoData;
    }

    public function createEmp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleadoData = $this->collectFormData();

            // Validar los datos del empleado utilizando el validador
            $errores = $this->validador->validarDatosEmpleado($empleadoData);

            // Si hay errores, mostrar el formulario nuevamente con los errores
            if (!empty($errores)) {
                $rolModel = new ModelRolEmpleado([], $this->conn);
                $roles = $rolModel->getAllRoles();
                include_once VIEWS . 'empleados/ViewCreateEmpleado.php'; // Mostrar el formulario con errores
                return; // Detener la ejecución para evitar la creación con datos inválidos
            }

            // Si no hay errores, proceder con la creación del empleado
            $empleadoModel = new ModelEmpleado($empleadoData, $this->conn);
            if ($empleadoModel->createEmpleado()) {
                $this->index(); // Redirigir al listado de empleados después de crear uno nuevo
            } else {
                $this->index("Error al dar de alta al Empleado.");
            }
        } else {
            $rolModel = new ModelRolEmpleado([], $this->conn);
            $roles = $rolModel->getAllRoles();
            include_once VIEWS . 'empleados/ViewCreateEmpleado.php'; // Mostrar el formulario de creación inicial
        }
    }


    public function editEmp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleadoData = $this->collectFormData();

            // Validar los datos del empleado utilizando el validador
            $errores = $this->validador->validarDatosEmpleado($empleadoData);

            // Si hay errores, mostrar el formulario nuevamente con los errores
            if (!empty($errores)) {
                $emp_num_legajo = $empleadoData['emp_num_legajo'] ?? null;
                $empleadoModel = new ModelEmpleado([], $this->conn);
                $empleado = $empleadoModel->readEmpleado($emp_num_legajo);
                $rolModel = new ModelRolEmpleado([], $this->conn);
                $roles = $rolModel->getAllRoles();
                include_once VIEWS . 'empleados/ViewUpdateEmpleado.php'; // Mostrar el formulario con errores
                return; // Detener la ejecución para evitar la actualización con datos inválidos
            }

            // Si no hay errores, proceder con la actualización del empleado
            $empleadoModel = new ModelEmpleado($empleadoData, $this->conn);
            if ($empleadoModel->updateEmpleado()) {
                $this->index();
            } else {
                $this->index("No se han modificado datos.");
            }
        } else {
            $emp_num_legajo = $_GET['emp_num_legajo'] ?? null;
            if ($emp_num_legajo) {
                $empleadoModel = new ModelEmpleado([], $this->conn);
                $empleado = $empleadoModel->readEmpleado($emp_num_legajo);
                $rolModel = new ModelRolEmpleado([], $this->conn);
                $roles = $rolModel->getAllRoles();
                include_once VIEWS . 'empleados/ViewUpdateEmpleado.php';
            } else {
                echo "No se especificó el número de legajo del empleado";
            }
        }
    }


    public function deleteEmp()
    {
        $emp_num_legajo = $_POST['emp_num_legajo'] ?? null;
        $motivo = $_POST['motivo'];
        if ($emp_num_legajo) {
            $empleadoModel = new ModelEmpleado(['emp_num_legajo' => $emp_num_legajo], $this->conn);
            if ($empleadoModel->deleteEmpleado($motivo)) {
                $this->index();
                $this->ctrAuditoria->registrarAuditoriaEmpleado($motivo);
            }
        } else {
            echo "No se especificó el número de legajo del empleado";
        }
    }

    public function showEmp()
    {
        $emp_num_legajo = $_GET['emp_num_legajo'] ?? null;
        if ($emp_num_legajo) {
            $empleadoModel = new ModelEmpleado([], $this->conn);
            $empleado = $empleadoModel->readEmpleado($emp_num_legajo);
            include_once VIEWS . 'empleado/ViewShowEmpleado.php';
        } else {
            echo "No se especificó el número de legajo del empleado";
        }
    }
}
