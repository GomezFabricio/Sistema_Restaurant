<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../public/assets/css/validacion.css">
    <style>
        .custom-modal {
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-modal-header {
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include_once VIEWS . 'includes/SideBarMenu.php'; ?>
        <div class="container mt-5">
            <div class="custom-modal">
                <div class="custom-modal-header">
                    <h1 class="mb-4">Alta Empleado</h1>
                </div>
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="emp_nombre">Nombre</label>
                            <input type="text" class="form-control" id="emp_nombre" name="emp_nombre">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_nombre'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_nombre']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emp_apellido">Apellido</label>
                            <input type="text" class="form-control" id="emp_apellido" name="emp_apellido">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_apellido'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_apellido']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emp_dni">DNI</label>
                            <input type="text" class="form-control" id="emp_dni" name="emp_dni">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_dni'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_dni']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="emp_domicilio">Domicilio</label>
                            <input type="text" class="form-control" id="emp_domicilio" name="emp_domicilio">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_domicilio'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_domicilio']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emp_email">Email</label>
                            <input type="email" class="form-control" id="emp_email" name="emp_email">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_email'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_email']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="emp_contacto">Contacto</label>
                            <input type="text" class="form-control" id="emp_contacto" name="emp_contacto">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_contacto'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_contacto']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emp_fecha_inicio">Fecha Inicio</label>
                            <input type="date" class="form-control" id="emp_fecha_inicio" name="emp_fecha_inicio">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_fecha_inicio'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_fecha_inicio']; ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="emp_fecha_nac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="emp_fecha_nac" name="emp_fecha_nac">
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['emp_fecha_nac'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['emp_fecha_nac']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="rol_id">Rol</label>
                            <select class="form-control" id="rol_id" name="rol_id">
                                <option value="">Seleccione un rol</option>
                                <?php foreach ($roles as $rol) : ?>
                                    <option value="<?php echo htmlspecialchars($rol['rol_id']); ?>">
                                        <?php echo htmlspecialchars($rol['rol_empleado']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="error-message text-danger mt-2"></div>
                            <?php if (isset($errores['rol_id'])) : ?>
                                <div class="error-message backend-error-message text-danger mt-2"><?php echo $errores['rol_id']; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <input type="hidden" name="route" value="/createEmp">
                    <button type="submit" class="btn btn-primary">Cargar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Validaciones JS -->
    <script src="../public/assets/js/Validaciones.js"></script>
</body>

</html>