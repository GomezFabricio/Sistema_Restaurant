<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include_once VIEWS . 'includes/SideBarMenu.php'; ?>
        <div class="container mt-5">
            <h1 class="mb-4">Crear Nuevo Proveedor</h1>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="prov_nombre">Nombre</label>
                    <input type="text" class="form-control" id="prov_nombre" name="prov_nombre" >
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['prov_nombre'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['prov_nombre']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="prov_telefono">Teléfono</label>
                    <input type="text" class="form-control" id="prov_telefono" name="prov_telefono" >
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['prov_telefono'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['prov_telefono']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="prov_descripcion">Descripción</label>
                    <input type="text" class="form-control" id="prov_descripcion" name="prov_descripcion" >
                    <div class="error-message text-danger mt-2"></div>
                    <?php if (isset($errores['prov_descripcion'])) : ?>
                        <div class="error-message text-danger mt-2"><?php echo $errores['prov_descripcion']; ?></div>
                    <?php endif; ?>
                </div>
                <input type="hidden" name="route" value="/createProv">
                <button type="submit" class="btn btn-primary">Crear</button>
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