# Sistema de Header con Autenticación PHP

Este proyecto incluye un header completo con sistema de inicio de sesión y gestión de usuario.

## Archivos incluidos:

1. **header.php** - Header principal con menú de navegación y sistema de autenticación
2. **login.php** - Formulario de inicio de sesión
3. **logout.php** - Script para cerrar sesión
4. **perfil.php** - Página para ver y modificar el perfil del usuario
5. **index.php** - Página principal de ejemplo
6. **styles.css** - Estilos CSS del header y formularios

## Características:

✅ Header responsive con navegación
✅ Sistema de inicio de sesión con formulario separado
✅ Menú desplegable del usuario al hacer clic
✅ Opciones para ver perfil y cerrar sesión
✅ Página de perfil con formulario de edición
✅ Diseño moderno y profesional
✅ Compatibilidad con dispositivos móviles

## Credenciales de prueba:

- Email: `usuario@ejemplo.com`
- Contraseña: `123456`

## Uso:

1. Coloca todos los archivos en tu servidor web con soporte PHP
2. Accede a `index.php` en tu navegador
3. Haz clic en "Iniciar sesión" para probar el sistema
4. Una vez logueado, verás tu nombre en el header
5. Haz clic en tu nombre para desplegar el menú con opciones

## Personalización:

### Conectar con base de datos:

En `login.php` (línea ~23-34), reemplaza la validación de ejemplo con tu consulta a la base de datos:

```php
// Ejemplo con MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);
$stmt = $conn->prepare("SELECT id, nombre, email FROM usuarios WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $hashed_password);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['usuario_id'] = $user['id'];
    $_SESSION['usuario_nombre'] = $user['nombre'];
    $_SESSION['usuario_email'] = $user['email'];
    header('Location: index.php');
    exit();
}
```

### Actualización del perfil:

En `perfil.php` (línea ~20-35), implementa la actualización en la base de datos:

```php
// Ejemplo con MySQLi
$stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, email = ? WHERE id = ?");
$stmt->bind_param("ssi", $nombre, $email, $_SESSION['usuario_id']);
$stmt->execute();
```

## Notas de seguridad:

⚠️ **IMPORTANTE**: Este es un ejemplo educativo. Para producción debes:

1. Usar password_hash() y password_verify() para las contraseñas
2. Implementar protección CSRF
3. Validar y sanitizar todas las entradas
4. Usar prepared statements para prevenir SQL injection
5. Implementar límites de intentos de login
6. Usar HTTPS en producción

## Estructura de sesión:

Las variables de sesión utilizadas son:
- `$_SESSION['usuario_id']` - ID del usuario
- `$_SESSION['usuario_nombre']` - Nombre completo del usuario
- `$_SESSION['usuario_email']` - Email del usuario
