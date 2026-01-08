<?php
session_start();

// Verificar si el usuario está logueado
if(!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

$mensaje = '';
$error = '';

// Procesar actualización del perfil
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password_actual = $_POST['password_actual'] ?? '';
    $password_nuevo = $_POST['password_nuevo'] ?? '';
    
    if($nombre && $email) {
        // Aquí deberías actualizar en la base de datos
        // Este es un ejemplo simplificado
        $_SESSION['usuario_nombre'] = $nombre;
        $_SESSION['usuario_email'] = $email;
        
        $mensaje = 'Perfil actualizado correctamente';
    } else {
        $error = 'Por favor completa todos los campos obligatorios';
    }
}

$nombre = $_SESSION['usuario_nombre'] ?? '';
$email = $_SESSION['usuario_email'] ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/perfil.css">

</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="profile-container">
        <div class="profile-box">
            <div class="profile-header">
                <div class="profile-avatar">
                    👤
                </div>
                <div class="profile-info">
                    <h2><?php echo htmlspecialchars($nombre); ?></h2>
                    <p><?php echo htmlspecialchars($email); ?></p>
                </div>
            </div>
            
            <?php if($mensaje): ?>
                <div class="success-message">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>
            
            <?php if($error): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="perfil.php">
                <div class="form-section">
                    <h3>Información Personal</h3>
                    
                    <div class="form-group">
                        <label for="nombre">Nombre completo</label>
                        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                </div>
                
                <div class="divider"></div>
                
                <div class="form-section">
                    <h3>Cambiar Contraseña</h3>
                    
                    <div class="form-group">
                        <label for="password_actual">Contraseña actual</label>
                        <input type="password" id="password_actual" name="password_actual" placeholder="Dejar vacío si no deseas cambiarla">
                    </div>
                    
                    <div class="form-group">
                        <label for="password_nuevo">Nueva contraseña</label>
                        <input type="password" id="password_nuevo" name="password_nuevo" placeholder="Dejar vacío si no deseas cambiarla">
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
