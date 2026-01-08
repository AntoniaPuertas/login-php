<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        .main-content {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .welcome-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .welcome-box h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 32px;
        }
        
        .welcome-box p {
            color: #7f8c8d;
            font-size: 18px;
            line-height: 1.6;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .feature-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .feature-card h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .feature-card p {
            color: #7f8c8d;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="welcome-box">
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <h2>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?>!</h2>
                <p>Has iniciado sesión correctamente. Explora las funcionalidades de tu cuenta.</p>
            <?php else: ?>
                <h2>¡Bienvenido a nuestro sitio!</h2>
                <p>Por favor, inicia sesión para acceder a todas las funcionalidades.</p>
            <?php endif; ?>
        </div>
        
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">🚀</div>
                <h3>Rápido y Seguro</h3>
                <p>Sistema de autenticación robusto y eficiente</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">⚙️</div>
                <h3>Personalizable</h3>
                <p>Configura tu perfil según tus necesidades</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>Privacidad</h3>
                <p>Tus datos están protegidos y seguros</p>
            </div>
        </div>
    </div>
</body>
</html>
