<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../public/assets/css/validacion.css">
</head>

<body>
    <div class="d-flex">
        <?php include_once VIEWS . 'includes/SideBarMenu.php'; ?>
        <div class="container mt-5">
            <h1>Editar Empleado</h1>
            <form action="" method="POST">
                <input type="hidden" name="route" value="/editEmp">
                <input type="hidden" name="emp_num_legajo" value="<?php echo htmlspecialchars($empleado['emp_num_legajo']); ?>">

                <div class="form-group">
                    <label for="emp_nombre">Nombre</label>
                    <input type="text" class="form-control" id="emp_nombre" name="emp_nombre" value="<?php echo htmlspecialchars($empleado['emp_nombre']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_nombre'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_nombre']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_apellido">Apellido</label>
                    <input type="text" class="form-control" id="emp_apellido" name="emp_apellido" value="<?php echo htmlspecialchars($empleado['emp_apellido']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_apellido'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_apellido']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_dni">DNI</label>
                    <input type="text" class="form-control" id="emp_dni" name="emp_dni" value="<?php echo htmlspecialchars($empleado['emp_dni']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_dni'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_dni']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_fecha_inicio">Fecha Inicio</label>
                    <input type="date" class="form-control" id="emp_fecha_inicio" name="emp_fecha_inicio" value="<?php echo htmlspecialchars($empleado['emp_fecha_inicio']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_fecha_inicio'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_fecha_inicio']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_domicilio">Domicilio</label>
                    <input type="text" class="form-control" id="emp_domicilio" name="emp_domicilio" value="<?php echo htmlspecialchars($empleado['emp_domicilio']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_domicilio'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_domicilio']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_contacto">Contacto</label>
                    <input type="text" class="form-control" id="emp_contacto" name="emp_contacto" value="<?php echo htmlspecialchars($empleado['emp_contacto']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_contacto'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_contacto']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_email">Email</label>
                    <input type="email" class="form-control" id="emp_email" name="emp_email" value="<?php echo htmlspecialchars($empleado['emp_email']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_email'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_email']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="emp_fecha_nac">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="emp_fecha_nac" name="emp_fecha_nac" value="<?php echo htmlspecialchars($empleado['emp_fecha_nac']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['emp_fecha_nac'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['emp_fecha_nac']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="rol_id">Rol</label>
                    <select class="form-control" id="rol_id" name="rol_id">
                        <?php foreach ($roles as $rol) : ?>
                            <option value="<?php echo htmlspecialchars($rol['rol_id']); ?>" <?php echo $rol['rol_id'] == $empleado['rol_id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($rol['rol_empleado']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['rol_id'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['rol_id']; ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Empleado</button>
            </form>
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