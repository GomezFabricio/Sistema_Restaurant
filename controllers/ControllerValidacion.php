<?php

class ControllerValidacion
{

    public function validarDatosEmpleado($datos)
    {
        $errores = [];

        // Validaciones específicas para cada campo de empleado
        if (empty($datos['emp_nombre'])) {
            $errores['emp_nombre'] = 'El nombre es requerido.';
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $datos['emp_nombre'])) {
            $errores['emp_nombre'] = 'El nombre solo puede contener letras y espacios.';
        }

        if (empty($datos['emp_apellido'])) {
            $errores['emp_apellido'] = 'El apellido es requerido.';
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $datos['emp_apellido'])) {
            $errores['emp_apellido'] = 'El apellido solo puede contener letras y espacios.';
        }

        if (empty($datos['emp_dni'])) {
            $errores['emp_dni'] = 'El DNI es requerido.';
        } elseif (!preg_match('/^\d{8}$/', $datos['emp_dni'])) {
            $errores['emp_dni'] = 'El DNI debe contener 8 números.';
        }

        if (empty($datos['emp_fecha_inicio'])) {
            $errores['emp_fecha_inicio'] = 'La fecha de inicio es requerida.';
        } elseif (!$this->validarFecha($datos['emp_fecha_inicio'])) {
            $errores['emp_fecha_inicio'] = 'La fecha de inicio no es válida.';
        }

        if (empty($datos['emp_domicilio'])) {
            $errores['emp_domicilio'] = 'El domicilio es requerido.';
        }

        if (empty($datos['emp_contacto'])) {
            $errores['emp_contacto'] = 'El contacto es requerido.';
        } elseif (!preg_match('/^\d{10}$/', $datos['emp_contacto'])) {
            $errores['emp_contacto'] = 'El contacto debe contener 10 números.';
        }

        if (empty($datos['emp_email'])) {
            $errores['emp_email'] = 'El email es requerido.';
        } elseif (!filter_var($datos['emp_email'], FILTER_VALIDATE_EMAIL)) {
            $errores['emp_email'] = 'El email no es válido.';
        }

        if (empty($datos['emp_fecha_nac'])) {
            $errores['emp_fecha_nac'] = 'La fecha de nacimiento es requerida.';
        } elseif (!$this->validarFecha($datos['emp_fecha_nac'])) {
            $errores['emp_fecha_nac'] = 'La fecha de nacimiento no es válida.';
        }

        if (empty($datos['rol_id'])) {
            $errores['rol_id'] = 'El rol es requerido.';
        }

        return $errores;
    }

    public function validarDatosProveedor($datos)
    {
        $errores = [];

        // Validaciones específicas para cada campo de proveedor
        if (empty($datos['prov_nombre'])) {
            $errores['prov_nombre'] = 'El nombre es requerido.';
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $datos['prov_nombre'])) {
            $errores['prov_nombre'] = 'El nombre solo puede contener letras y espacios.';
        }

        if (empty($datos['prov_telefono'])) {
            $errores['prov_telefono'] = 'El teléfono es requerido.';
        } elseif (!preg_match('/^\d{10}$/', $datos['prov_telefono'])) {
            $errores['prov_telefono'] = 'El teléfono debe contener 10 números.';
        }

        if (empty($datos['prov_descripcion'])) {
            $errores['prov_descripcion'] = 'La descripción es requerida.';
        }

        return $errores;
    }

    private function validarFecha($fecha)
    {
        $partes = explode('-', $fecha);
        if (count($partes) == 3 && checkdate($partes[1], $partes[2], $partes[0])) {
            return true;
        }
        return false;
    }
}
