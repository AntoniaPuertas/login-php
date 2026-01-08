<?php
session_start();

// Generar token CSRF si no existe
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Si ya está logueado, redirigir al inicio
if(isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit();
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = 'Error de seguridad: token CSRF inválido';
    } else {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        // Aquí deberías validar con tu base de datos
        // Este es un ejemplo simplificado
        if($email && $password) {
            // Ejemplo de validación (REEMPLAZAR con consulta a BD real)
            if($email === 'usuario@ejemplo.com' && $password === '123456') {
                $_SESSION['usuario_id'] = 1;
                $_SESSION['usuario_nombre'] = 'Juan Pérez';
                $_SESSION['usuario_email'] = $email;
                
                header('Location: index.php');
                exit();
            } else {
                $error = 'Credenciales incorrectas';
            }
        } else {
            $error = 'Por favor completa todos los campos';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="login-container">
        <div class="login-box">
            <h2>Iniciar Sesión</h2>
            
            <div class="demo-info">
                <strong>Credenciales de prueba:</strong>
                Email: usuario@ejemplo.com<br>
                Contraseña: 123456
            </div>
            
            <?php if($error): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="submit-btn">Iniciar Sesión</button>
            </form>
            
            <div class="login-footer">
                <p>¿No tienes cuenta? <a href="#">Regístrate</a></p>
            </div>
        </div>
    </div>
</body>
</html>
