<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <!-- Estilos personalizados -->
    <link href="../public/assets/css/table.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <?php include_once VIEWS . 'includes/SideBarMenu.php'; ?>
        <div class="container mt-5">
            <?php if (isset($message)) : ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Lista de Empleados</h1>
                <div>
                    <form id="form-create" action="" method="GET" class="d-inline-block">
                        <input type="hidden" name="route" value="/createEmp">
                        <button type="submit" class="btn btn-primary">Agregar Empleado</button>
                    </form>
                    <form id="form-auditoria" action="" method="GET" class="d-inline-block ml-2">
                        <input type="hidden" name="route" value="/auditoria">
                        <button type="submit" class="btn btn-secondary">Auditoría</button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table id="empleados" class="table table-hover custom-table display">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Domicilio</th>
                            <th>Contacto</th>
                            <th>Email</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Antigüedad</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($empleados)) : ?>
                            <?php foreach ($empleados as $empleado) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($empleado['emp_nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['emp_apellido']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['emp_dni']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['emp_domicilio']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['emp_contacto']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['emp_email']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['emp_fecha_nac']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['Antigüedad']) . ' año/s'; ?></td>
                                    <td><?php echo htmlspecialchars($empleado['rol_empleado']); ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="" method="GET" class="">
                                                <input type="hidden" name="route" value="/editEmp">
                                                <input type="hidden" name="emp_num_legajo" value="<?php echo $empleado['emp_num_legajo']; ?>">
                                                <button type="submit" class="btn btn-outline-warning btn-sm mr-2">Modificar</button>
                                            </form>
                                            <!-- Botón que abre la modal -->
                                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#eliminarEmpleado_<?php echo $empleado['emp_num_legajo']; ?>">
                                                Eliminar
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal para confirmación de eliminación -->
                                <div class="modal fade" id="eliminarEmpleado_<?php echo $empleado['emp_num_legajo']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEliminarEmpleado_<?php echo $empleado['emp_num_legajo']; ?>Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalEliminarEmpleado_<?php echo $empleado['emp_num_legajo']; ?>Label">Eliminar Empleado</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="formEliminarEmpleado_<?php echo $empleado['emp_num_legajo']; ?>" action="" method="POST">
                                                <div class="modal-body">
                                                    <input type="hidden" name="route" value="/deleteEmp">
                                                    <input type="hidden" name="emp_num_legajo" value="<?php echo $empleado['emp_num_legajo']; ?>">
                                                    <p>Ingrese el motivo de la baja de <?php echo htmlspecialchars($empleado['emp_nombre'] . ' ' . $empleado['emp_apellido']); ?>:</p>
                                                    <textarea class="form-control" name="motivo" rows="3" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
    <script src="../public/assets/js/DataTableEmpleados.js"></script>
    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Script para enviar el formulario dentro de la modal por AJAX
        $(document).ready(function() {
            $('form[id^="formEliminarEmpleado_"]').submit(function(event) {
                var form = $(this);
                var url = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    success: function(response) {
                        form.closest('.modal').modal('hide');
                    }
                });
            });
        });
    </script>
</body>

</html>