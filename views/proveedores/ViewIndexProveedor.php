<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <!-- Estilos personalizados -->
    <link href="../public/assets/css/table.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex">
        <?php include_once  VIEWS . 'includes/SideBarMenu.php'; ?>

        <div class="container mt-5">
            <?php if (isset($message)) : ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h1>Lista de Proveedores</h1>
                <form id="form-create" action="" method="GET">
                    <input type="hidden" name="route" value="/createProv">
                    <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
                </form>
            </div>
            <div class="table-responsive">
                <table id="proveedores" class="table table-hover custom-table display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($proveedores)) : ?>
                            <?php foreach ($proveedores as $proveedor) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['prov_nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['prov_telefono']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['prov_descripcion']); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <form action="" method='GET' class="">
                                                <input type="hidden" name="route" value="/editProv">
                                                <input type="hidden" name='prov_id' value="<?php echo $proveedor['prov_id']; ?>">
                                                <button type="submit" class="btn btn-outline-warning btn-sm mr-2">Modificar</button>
                                            </form>
                                            <form action="" method='GET'>
                                                <input type="hidden" name="route" value="/deleteProv">
                                                <input type="hidden" name='prov_id' value="<?php echo $proveedor['prov_id']; ?>">
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar a este proveedor');">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="../public/assets/js/DataTableProveedores.js"></script>
        <!-- Bootstrap JS y dependencias -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>