<?php

// Definir las rutas de la aplicación
$routes = [
    '/'           => 'ControllerEmpleado@index',     // Página principal
    '/createEmp'  => 'ControllerEmpleado@createEmp', // Crear un nuevo empleado
    '/editEmp'    => 'ControllerEmpleado@editEmp',   // Editar un empleado existente
    '/deleteEmp'  => 'ControllerEmpleado@deleteEmp', // Eliminar un empleado
    '/showEmp'    => 'ControllerEmpleado@showEmp',   // Mostrar detalles de un empleado

    '/listProv'   => 'ControllerProveedor@listProv',  // Listado proveedores
    '/createProv' => 'ControllerProveedor@createProv', // Crear un nuevo Proveedor
    '/editProv'   => 'ControllerProveedor@editProv',   // Editar un Proveedor existente
    '/deleteProv' => 'ControllerProveedor@deleteProv', // Eliminar un Proveedor
    '/showProv'   => 'ControllerProveedor@showProv',   // Mostrar detalles de un Proveedor

    '/login'      => 'ControllerLogin@login',          // Ruta para el inicio de sesión
    '/logout'     => 'ControllerLogin@logout'          // Ruta para cerrar sesión
];

// Función para obtener el controlador y el método de la ruta
function getControllerAndAction($route)
{
    global $routes;
    if (array_key_exists($route, $routes)) {
        return explode('@', $routes[$route]);
    }
    return null;
}
