<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<header class="header">
    <div class="container">
        <div class="logo">
            <h1>Mi Sitio</h1>
        </div>
        
        <nav class="nav">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        
        <div class="auth-section">
            <?php if(isset($_SESSION['usuario_id'])): ?>
                <!-- Usuario logueado -->
                <div class="user-menu">
                    <button class="user-button" id="userMenuBtn">
                        <span class="user-icon">👤</span>
                        <span class="user-name"><?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span>
                        <span class="arrow">▼</span>
                    </button>
                    
                    <div class="dropdown-menu" id="dropdownMenu">
                        <a href="perfil.php" class="dropdown-item">
                            <span class="icon">⚙️</span> Ver perfil
                        </a>
                        <a href="logout.php" class="dropdown-item">
                            <span class="icon">🚪</span> Cerrar sesión
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Usuario no logueado -->
                <a href="login.php" class="login-link">Iniciar sesión</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    // Toggle del menú desplegable
    const userMenuBtn = document.getElementById('userMenuBtn');
    const dropdownMenu = document.getElementById('dropdownMenu');
    
    if(userMenuBtn) {
        userMenuBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });
        
        // Cerrar el menú al hacer click fuera
        document.addEventListener('click', function(e) {
            if(!userMenuBtn.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    }
</script>
