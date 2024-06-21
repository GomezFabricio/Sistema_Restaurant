<?php

include_once MODELS . 'conexion.php';
include_once MODELS . 'ModelProveedor.php';
include_once CONTROLLERS . 'ControllerValidacion.php';

class ControllerProveedor
{
    private $conn;
    private $validador;

    public function __construct()
    {
        // Asignar la conexión establecida en conexion.php a $this->conn
        $this->conn = getDbConnection();
        $this->validador = new ControllerValidacion();
    }

    public function listProv($message = null)
    {
        $proveedorModel = new ModelProveedor([], $this->conn);
        $proveedores = $proveedorModel->showAllProveedores();
        include_once VIEWS . 'proveedores/ViewIndexProveedor.php';

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
        $proveedorData = [
            'prov_nombre' => $_POST['prov_nombre'] ?? null,
            'prov_telefono' => $_POST['prov_telefono'] ?? null,
            'prov_descripcion' => $_POST['prov_descripcion'] ?? null,
            'prov_id' => $_POST['prov_id'] ?? null,
        ];
        return $proveedorData;
    }

    public function createProv()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proveedorData = $this->collectFormData();

            // Validar los datos del proveedor utilizando el validador
            $errores = $this->validador->validarDatosProveedor($proveedorData);

            // Si hay errores, mostrar el formulario nuevamente con los errores
            if (!empty($errores)) {
                include_once VIEWS . 'proveedores/ViewCreateProveedor.php';
                return; // Detener la ejecución para evitar la creación con datos inválidos
            }

            // Si no hay errores, proceder con la creación del proveedor
            $proveedorModel = new ModelProveedor($proveedorData, $this->conn);
            if ($proveedorModel->createProveedor()) {
                $this->listProv(); // Redirigir al listado de proveedores después de crear uno nuevo
            } else {
                $this->listProv("Error al dar de alta al Proveedor.");
            }
        } else {
            include_once VIEWS . 'proveedores/ViewCreateProveedor.php'; // Mostrar el formulario de creación inicial
        }
    }

    public function editProv()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proveedorData = $this->collectFormData();

            // Validar los datos del proveedor utilizando el validador para la actualización
            $errores = $this->validador->validarDatosProveedor($proveedorData);

            // Si hay errores, mostrar el formulario nuevamente con los errores
            if (!empty($errores)) {
                $prov_id = $proveedorData['prov_id'] ?? null;
                $proveedorModel = new ModelProveedor([], $this->conn);
                $proveedor = $proveedorModel->readProveedor($prov_id);
                include_once VIEWS . 'proveedores/ViewUpdateProveedor.php'; // Mostrar el formulario con errores
                return; // Detener la ejecución para evitar la actualización con datos inválidos
            }

            // Si no hay errores, proceder con la actualización del proveedor
            $proveedorModel = new ModelProveedor($proveedorData, $this->conn);
            if ($proveedorModel->updateProveedor()) {
                $this->listProv(); // Redirigir al listado de proveedores después de actualizar
            } else {
                $this->listProv("No se han modificado datos.");
            }
        } else {
            $prov_id = $_GET['prov_id'] ?? null;
            if ($prov_id) {
                $proveedorModel = new ModelProveedor([], $this->conn);
                $proveedor = $proveedorModel->readProveedor($prov_id);
                include_once VIEWS . 'proveedores/ViewUpdateProveedor.php';
            } else {
                echo "No se especificó el ID del proveedor";
            }
        }
    }

    public function deleteProv()
    {
        $prov_id = $_GET['prov_id'] ?? null;
        if ($prov_id) {
            $proveedorModel = new ModelProveedor(['prov_id' => $prov_id], $this->conn);
            if ($proveedorModel->deleteProveedor()) {
                $this->listProv();
            } else {
                $this->listProv("Error al dar de baja al Proveedor");
            }
        } else {
            echo "No se especificó el ID del proveedor";
        }
    }

    public function showProv()
    {
        $prov_id = $_GET['prov_id'] ?? null;
        if ($prov_id) {
            $proveedorModel = new ModelProveedor([], $this->conn);
            $proveedor = $proveedorModel->readProveedor($prov_id);
            include_once VIEWS . 'proveedores/ViewShowProveedor.php';
        } else {
            echo "No se especificó el ID del proveedor";
        }
    }
}
