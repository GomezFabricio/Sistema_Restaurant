<?php
// Iniciar la sesión
session_start();

// Configurar las constantes de ruta
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT);
define('CONTROLLERS', APP . 'controllers' . DIRECTORY_SEPARATOR);
define('MODELS', APP . 'models' . DIRECTORY_SEPARATOR);
define('VIEWS', APP . 'views' . DIRECTORY_SEPARATOR);
define('ROUTES', APP . 'routes' . DIRECTORY_SEPARATOR);

// Incluir el archivo de rutas
require_once ROUTES . 'routes.php';

// Función para verificar si el usuario está autenticado
function estaAutenticado()
{
    return isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true;
}

// Obtener la ruta solicitada
$route = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['route'])) {
    $route = $_POST['route'];
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['route'])) {
    $route = $_GET['route'];
}

// Determinar el controlador y la acción a ejecutar
if ($route === '/login' || $route === '/logout') {
    list($controller, $action) = getControllerAndAction($route);
} else {
    if (!estaAutenticado()) {
        // Redirigir a la página de inicio de sesión si no está autenticado
        $controller = 'ControllerLogin';
        $action = 'login';
    } else {
        list($controller, $action) = getControllerAndAction($route);
        if (!$controller || !$action) {
            // Redirigir a la página principal si la ruta no existe
            $controller = 'ControllerEmpleado';
            $action = 'index';
        }
    }
}

// Incluir el archivo del controlador
include CONTROLLERS . $controller . '.php';

// Crear una instancia del controlador y llamar a la acción
$controllerInstance = new $controller();
$controllerInstance->$action();
