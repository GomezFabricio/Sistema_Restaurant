<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Estilos personalizados -->
    <link href="../public/assets/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="image-section">
            <img src="#" alt="">
        </div>
        <div class="login-section">
            <h2 class="welcome-text">BIENVENIDO</h2>
            <form action="" method="POST">
                <input type="hidden" name="route" value="/login">
                <div class="form-group">
                    <input class="form-control" name="user_dni" placeholder="DNI" type="text">
                </div>
                <div class="form-group">
                    <input class="form-control" name="user_pass" placeholder="Contraseña" type="text">
                </div>
                <?php if (isset($message) && !empty($message)) : ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($message); ?></div>
                <?php endif; ?>
                <button type="submit" name="submit" class="btn btn-primary">Iniciar Sesión</button>
                <button type="button" class="btn btn-secondary">Recuperar Contraseña</button>
            </form>
        </div>
    </div>
</body>

</html>