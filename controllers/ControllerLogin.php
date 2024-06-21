<?php

include_once MODELS . 'ModelLogin.php';
require_once MODELS . 'conexion.php';
include_once CONTROLLERS . 'ControllerEmpleado.php';

class ControllerLogin
{
    private $modelLogin;
    private $conn;
    private $ctrEmp;

    public function __construct()
    {
        $this->conn = getDbConnection();
        $this->modelLogin = new ModelLogin($this->conn);
        $this->ctrEmp = new ControllerEmpleado();
    }

    public function login()
    {
        // Verificar si la sesión ya está activa
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Iniciar la sesión si no está iniciada
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dni = $_POST['user_dni'] ?? null;
            $password = $_POST['user_pass'] ?? null;

            // Validar los datos recibidos
            if (empty($dni) || empty($password)) {
                $message = "El DNI y la contraseña son obligatorios.";
                include VIEWS . 'login/ViewLogin.php';
                return;
            }

            // Llamar al método del modelo para obtener el usuario
            $user = $this->modelLogin->getUser($dni, $password);

            if ($user) {
                $_SESSION['autenticado'] = true;
                $_SESSION['usuario_dni'] = $user['emp_dni'];
                $_SESSION['usuario_nombre'] = $user['emp_nombre'];
                $_SESSION['usuario_apellido'] = $user['emp_apellido'];
                $_SESSION['num_legajo'] = $user['emp_num_legajo'];
                $this->ctrEmp->index();
                exit();
            } else {
                // Error de inicio de sesión
                $message = "DNI o contraseña incorrectos.";
                include VIEWS . 'login/ViewLogin.php';
                return;
            }
        }

        // Si la solicitud no es POST, mostrar el formulario de inicio de sesión
        include VIEWS . 'login/ViewLogin.php';
    }

    public function logout()
    {
        // Verificar si la sesión ya está activa
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Iniciar la sesión si no está iniciada
        }

        session_unset();
        session_destroy();
        include VIEWS . 'login/ViewLogin.php';
        exit();
    }
}
