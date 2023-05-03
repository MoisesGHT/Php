<?php 
session_start();

// Comprobar si el usuario ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobar si el nombre de usuario y la contraseña son correctos
    if ($_POST['usuario'] === 'admin' && $_POST['contraseña'] === 'secreta') {
        // Guardar un valor en la sesión para indicar que el usuario ha iniciado sesión
        $_SESSION['usuario'] = $_POST['usuario'];

        // Redirigir al usuario a la pagina de inicio
        header('Location: inicio.php');
        exit;
    } else {
        // Mostrar un mensaje de error si el nombre de usuario o la contraseña son incorrectos
        $mensaje = 'Nombre de usuario o contraseña incorrectos';
    }
}
?>

<!-- Formulario HTML para iniciar sesión -->
<html>
<body>
    <form method='post'>
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario">
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña">
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>

<?php 
// Mostrar un mensaje de error si es necesario
if (isset($mensaje)) {
    echo '<p>'  . $mensaje . '</p>';
}
?>
</body>
</html>