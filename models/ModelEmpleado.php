<?php
    class ModelEmpleado {
        // Propiedad para la conexión a la base de datos
        private $conn;

        // Atributos
        private $emp_num_legajo;
        private $rol_id;
        private $emp_nombre;
        private $emp_apellido;
        private $emp_contacto;
        private $emp_domicilio;
        private $emp_email;
        private $emp_dni;
        private $emp_fecha_inicio;
        private $emp_fecha_nac;

        // Constructor
        public function __construct($data = [], $conn) {
            $this->conn = $conn;
            $this->emp_num_legajo = $data['emp_num_legajo'] ?? null;
            $this->rol_id = $data['rol_id'] ?? null;
            $this->emp_nombre = $data['emp_nombre'] ?? null;
            $this->emp_apellido = $data['emp_apellido'] ?? null;
            $this->emp_contacto = $data['emp_contacto'] ?? null;
            $this->emp_domicilio = $data['emp_domicilio'] ?? null;
            $this->emp_email = $data['emp_email'] ?? null;
            $this->emp_dni = $data['emp_dni'] ?? null;
            $this->emp_fecha_inicio = $data['emp_fecha_inicio'] ?? null;
            $this->emp_fecha_nac = $data['emp_fecha_nac'] ?? null;
        }

        // Métodos Getters
        public function getEmpNumLegajo() {
            return $this->emp_num_legajo;
        }

        public function getRolId() {
            return $this->rol_id;
        }

        public function getEmpNombre() {
            return $this->emp_nombre;
        }

        public function getEmpApellido() {
            return $this->emp_apellido;
        }

        public function getEmpContacto() {
            return $this->emp_contacto;
        }

        public function getEmpDomicilio() {
            return $this->emp_domicilio;
        }

        public function getEmpEmail() {
            return $this->emp_email;
        }

        public function getEmpDni() {
            return $this->emp_dni;
        }

        public function getEmpFechaInicio() {
            return $this->emp_fecha_inicio;
        }

        public function getEmpFechaNac() {
            return $this->emp_fecha_nac;
        }

        // Métodos Setters
        public function setEmpNumLegajo($emp_num_legajo) {
            $this->emp_num_legajo = $emp_num_legajo;
        }

        public function setRolId($rol_id) {
            $this->rol_id = $rol_id;
        }

        public function setEmpNombre($emp_nombre) {
            $this->emp_nombre = $emp_nombre;
        }

        public function setEmpApellido($emp_apellido) {
            $this->emp_apellido = $emp_apellido;
        }

        public function setEmpContacto($emp_contacto) {
            $this->emp_contacto = $emp_contacto;
        }

        public function setEmpDomicilio($emp_domicilio) {
            $this->emp_domicilio = $emp_domicilio;
        }

        public function setEmpEmail($emp_email) {
            $this->emp_email = $emp_email;
        }

        public function setEmpDni($emp_dni) {
            $this->emp_dni = $emp_dni;
        }

        public function setEmpFechaInicio($emp_fecha_inicio) {
            $this->emp_fecha_inicio = $emp_fecha_inicio;
        }

        public function setEmpFechaNac($emp_fecha_nac) {
            $this->emp_fecha_nac = $emp_fecha_nac;
        }

        // Métodos CRUD (Create, Read, Update, Delete)
        public function createEmpleado()
        {
            // Preparar la consulta SQL
            $sql = "INSERT INTO empleados (rol_id, estEmp_id, emp_nombre, emp_apellido, emp_contacto, emp_domicilio, emp_email, emp_dni, emp_fecha_inicio, emp_fecha_nac) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Preparar la declaración SQL
            $stmt = $this->conn->prepare($sql);

            // Vincular parámetros
            $stmt->bind_param("issssssss", 
                $this->rol_id, 
                1,
                $this->emp_nombre, 
                $this->emp_apellido, 
                $this->emp_contacto, 
                $this->emp_domicilio, 
                $this->emp_email, 
                $this->emp_dni, 
                $this->emp_fecha_inicio, 
                $this->emp_fecha_nac);

            // Ejecutar la consulta
            $stmt->execute();

            // Verificar el resultado
            if ($stmt->affected_rows > 0
            ) {
                // La inserción fue exitosa
                return true;
            } else {
                // La inserción falló
                return false;
            }
        }

        public function updateEmpleado()

        {
            $sql = "UPDATE `empleados` SET `emp_nombre`= ?,`emp_apellido`= ?, `emp_dni`= ?, `emp_fecha_inicio`= ?, `emp_domicilio`= ?, `emp_contacto`= ?,`emp_email`= ?,`emp_fecha_nac`= ?, `rol_id`= ? WHERE `emp_num_legajo` = ?";

            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param(
                "ssssssssii",
                $this->emp_nombre,
                $this->emp_apellido,
                $this->emp_dni,
                $this->emp_fecha_inicio,
                $this->emp_domicilio,
                $this->emp_contacto,
                $this->emp_email,
                $this->emp_fecha_nac,
                $this->rol_id,
                $this->emp_num_legajo
            );
            $stmt->execute();

            if ($stmt->affected_rows > 0){
                return true;
            } else{
                return false;
            }
        }

        public function deleteEmpleado() 
        {
            $sql = "UPDATE `empleados` SET `estEmp_id` = 2 WHERE `emp_num_legajo` = ?";

            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param("i", $this->emp_num_legajo);

            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                return true;
            } else {
                return false;
            }
        }

        public function readEmpleado($emp_num_legajo)
        {
            $sql = "SELECT e.emp_num_legajo,
                        e.emp_nombre, 
                        e.emp_apellido, 
                        e.emp_dni, 
                        e.emp_domicilio, 
                        e.emp_contacto, 
                        e.emp_email, 
                        e.emp_fecha_nac, 
                        e.emp_fecha_inicio,
                        CASE 
                            WHEN 
                                (MONTH(CURDATE()) < MONTH(e.emp_fecha_inicio)) OR 
                                (MONTH(CURDATE()) = MONTH(e.emp_fecha_inicio) AND DAY(CURDATE()) < DAY(e.emp_fecha_inicio))
                            THEN 
                                YEAR(CURDATE()) - YEAR(e.emp_fecha_inicio) - 1
                            ELSE 
                                YEAR(CURDATE()) - YEAR(e.emp_fecha_inicio)
                        END AS Antigüedad, 
                        r.rol_empleado,
                        r.rol_id 
                    FROM 
                        empleados e 
                    JOIN 
                        rol_empleado r ON e.rol_id = r.rol_id
                    WHERE 
                        e.emp_num_legajo = ?";

            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $emp_num_legajo);
            $stmt->execute();

            // Obtener el resultado de la consulta
            $result = $stmt->get_result();

            // Verificar si se encontró un empleado
            if ($result->num_rows > 0) {
                // Obtener los datos del empleado
                $empleado = $result->fetch_assoc();
                // Retornar los datos del empleado
                return $empleado;
            } else {
                // Si no se encuentra ningún empleado, devolver null o un valor indicativo de que no se encontró
                return null;
            }
        }

        public function showAllEmpleados() {
            // Preparar la consulta SQL
            $sql = "SELECT e.emp_num_legajo, 
                        e.emp_nombre, 
                        e.emp_apellido, 
                        e.emp_dni, 
                        e.emp_domicilio, 
                        e.emp_contacto, 
                        e.emp_email, 
                        e.emp_fecha_nac, 
                        CASE 
                            WHEN 
                                (MONTH(CURDATE()) < MONTH(e.emp_fecha_inicio)) OR 
                                (MONTH(CURDATE()) = MONTH(e.emp_fecha_inicio) AND DAY(CURDATE()) < DAY(e.emp_fecha_inicio))
                            THEN 
                                YEAR(CURDATE()) - YEAR(e.emp_fecha_inicio) - 1
                            ELSE 
                                YEAR(CURDATE()) - YEAR(e.emp_fecha_inicio)
                        END AS Antigüedad, 
                        r.rol_empleado 
                    FROM empleados e 
                    JOIN rol_empleado r ON e.rol_id = r.rol_id
                    WHERE e.estEmp_id = 1 AND e.emp_num_legajo != ?";

            // Preparar la declaración SQL
            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param("i", $_SESSION['num_legajo']);

            // Ejecutar la consulta
            $stmt->execute();

            // Obtener el resultado de la consulta
            $result = $stmt->get_result();

            // Crear un array para almacenar todos los empleados
            $empleados = [];

            // Verificar si se encontraron empleados
            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y almacenar cada empleado en el array
                while ($empleado = $result->fetch_assoc()) {
                    $empleados[] = $empleado;
                }
            }

            // Retornar el array de empleados
            return $empleados;
        }
    }
?>