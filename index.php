<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <?php include 'header.php'; ?>

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

    <!-- Chatbot -->
    <button class="chatbot-toggle" id="chatbotToggle">💬</button>
    
    <div class="chatbot-container" id="chatbotContainer">
        <div class="chatbot-header">
            <h3>🎾 Club de Socios</h3>
            <p>Asistente Virtual</p>
        </div>
        
        <div class="chatbot-messages" id="chatbotMessages"></div>
        
        <div class="quick-replies" id="chatbotQuickReplies"></div>
        
        <div class="chatbot-input">
            <input type="text" id="chatbotUserInput" placeholder="Escribe tu mensaje...">
            <button onclick="chatbotSendMessage()">Enviar</button>
        </div>
    </div>

    <script src="js/chatbot.js"></script>
</body>
</html>
