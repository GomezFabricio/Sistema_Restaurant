<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="../public/css/form.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include_once VIEWS . 'includes/SideBarMenu.php'; ?>
        <div class="container mt-5">
            <h1>Editar Proveedor</h1>
            <form action="" method="POST">
                <input type="hidden" name="route" value="/editProv">
                <input type="hidden" name="prov_id" value="<?php echo htmlspecialchars($proveedor['prov_id']); ?>">
                <div class="form-group">
                    <label for="prov_nombre">Nombre</label>
                    <input type="text" class="form-control" id="prov_nombre" name="prov_nombre" value="<?php echo htmlspecialchars($proveedor['prov_nombre']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['prov_nombre'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['prov_nombre']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="prov_telefono">Teléfono</label>
                    <input type="text" class="form-control" id="prov_telefono" name="prov_telefono" value="<?php echo htmlspecialchars($proveedor['prov_telefono']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['prov_telefono'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['prov_telefono']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="prov_descripcion">Descripción</label>
                    <input type="text" class="form-control" id="prov_descripcion" name="prov_descripcion" value="<?php echo htmlspecialchars($proveedor['prov_descripcion']); ?>">
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['prov_descripcion'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['prov_descripcion']; ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
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