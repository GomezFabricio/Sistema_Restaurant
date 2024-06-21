<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="../public/assets/css/SideBarMenu.css">
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="nav" id="nav">
        <!-- Botón de hamburguesa -->
        <div class="hamburger" id="hamburger">
            <img src="../public/assets/icons/hamburger.svg" alt="Menu">
        </div>

        <!-- Contenedor para el logo o nombre del restaurante -->
        <div class="logo">
            <h1 class="logo__text">Restaurante Fortin</h1>
        </div>

        <!-- Contenedor para el nombre del usuario -->
        <div class="user">
            <img src="../public/assets/icons/logout.svg" class="user__logo" id="logout-icon" style="cursor: pointer;">
            <?php if (isset($_SESSION['autenticado']) && $_SESSION['autenticado']) : ?>
                <span class="user-info__name"><?php echo $_SESSION['usuario_nombre'], ' ', $_SESSION['usuario_apellido'] ?></span>
            <?php else : ?>
                <span class="user-info__name">Nombre del Usuario</span>
            <?php endif; ?>
        </div>

        <!-- Formulario para logout -->
        <form action="" method="POST" id="logout-form" style="display: none;">
            <input type="hidden" name="route" value="/logout">
            <button type="submit" id="logout-button"></button>
        </form>

        <!-- Lista de menús -->
        <ul class="list">
            <!-- Menú: Panel de Control -->
            <li class="list__item">
                <div class="list__button">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Panel de Control</a>
                </div>
            </li>

            <!-- Menú: Transacciones -->
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Transacciones</a>
                    <img src="../public/assets/icons/arrow.svg" class="list__arrow">
                </div>
                <!-- Submenús de Transacciones -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Registrar Operación</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Facturas</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Movimientos</a>
                    </li>
                </ul>
            </li>

            <!-- Menú: Empleados -->
            <li class="list__item">
                <div class="list__button">
                    <img src="../public/assets/icons/circle.svg" class="list__img" id="empleado__icon">
                    <form action="" method="GET" id="empleado__form" class="sidebar-form">
                        <input type="hidden" name="route" value="/">
                        <button type="submit" class="custom__button">Empleados</button>
                    </form>
                </div>
            </li>

            <!-- Menú: Usuarios -->
            <li class="list__item">
                <div class="list__button">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Usuarios</a>
                </div>
            </li>

            <!-- Menú: Menu -->
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Menu</a>
                    <img src="../public/assets/icons/arrow.svg" class="list__arrow">
                </div>
                <!-- Submenús de Menu -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Gestión de Menú</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Comidas</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Bebidas</a>
                    </li>
                </ul>
            </li>

            <!-- Menú: Mesas -->
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Mesas</a>
                    <img src="../public/assets/icons/arrow.svg" class="list__arrow">
                </div>
                <!-- Submenús de Mesas -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Pedidos en Curso</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Gestión de Mesas</a>
                    </li>
                </ul>
            </li>

            <!-- Menú: Reservas -->
            <li class="list__item">
                <div class="list__button">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Reservas</a>
                </div>
            </li>

            <!-- Menú: Inventario -->
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Inventario</a>
                    <img src="../public/assets/icons/arrow.svg" class="list__arrow">
                </div>
                <!-- Submenús de Inventario -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Recepción</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Productos</a>
                    </li>
                </ul>
            </li>

            <!-- Menú: Proveedores -->
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../public/assets/icons/circle.svg" class="list__img">
                    <a href="#" class="nav__link">Proveedores</a>
                    <img src="../public/assets/icons/arrow.svg" class="list__arrow">
                </div>
                <!-- Submenús de Proveedores -->
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Pedidos</a>
                    </li>
                    <li class="list__inside">
                        <form action="" method="GET" class="sidebar-form">
                            <input type="hidden" name="route" value="/listProv">
                            <button type="submit" class="custom__button custom__buttom__submenu">Gestión de Proveedores</button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

    <!-- Modal de confirmación -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirmar Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirm-logout">Cerrar Sesión</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlaces a jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Función para realizar logout
        function logout() {
            document.getElementById('logout-form').submit();
        }

        // Event listener para el icono de logout
        document.getElementById('logout-icon').addEventListener('click', function(event) {
            event.preventDefault();
            $('#logoutModal').modal('show');
        });

        // Event listener para confirmar logout en la modal
        document.getElementById('confirm-logout').addEventListener('click', function() {
            logout();
        });
    </script>
    <script src="../public/assets/js/SideBarMenu.js"></script>
</body>

</html>