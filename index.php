<!DOCTYPE html>
<html>
<head>
    <title>CRUD con arrays</title>
</head>
<body>
    <?php
    // Inicializar el array de registros
    $registros = array(
        array("id" => 1, "nombre" => "Juan", "email" => "juan@example.com"),
        array("id" => 2, "nombre" => "María", "email" => "maria@example.com"),
        array("id" => 3, "nombre" => "Pedro", "email" => "pedro@example.com")
    );

    // Verificar si se ha enviado un formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Procesar la acción del formulario
        if ($_POST["accion"] == "agregar") {
            // Agregar un nuevo registro al array
            $nuevo_registro = array(
                "id" => count($registros) + 1,
                "nombre" => $_POST["nombre"],
                "email" => $_POST["email"]
            );
            array_push($registros, $nuevo_registro);
        } elseif ($_POST["accion"] == "actualizar") {
            // Actualizar un registro existente en el array
            foreach ($registros as &$registro) {
                if ($registro["id"] == $_POST["id"]) {
                    $registro["nombre"] = $_POST["nombre"];
                    $registro["email"] = $_POST["email"];
                    break;
                }
            }
        } elseif ($_POST["accion"] == "eliminar") {
            // Eliminar un registro existente del array
            foreach ($registros as $indice => $registro) {
                if ($registro["id"] == $_POST["id"]) {
                    unset($registros[$indice]);
                    break;
                }
            }
        }
    }
    ?>

    <h1>CRUD con arrays</h1>

    <h2>Lista de registros</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
        <tr>
            <td><?= $registro["id"] ?></td>
            <td><?= $registro["nombre"] ?></td>
            <td><?= $registro["email"] ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                    <input type="hidden" name="accion" value="editar">
                    <button type="submit">Editar</button>
                </form>
                <form action="index.php" method="post">
                    <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                    <input type="hidden" name="accion" value="eliminar">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Agregar nuevo registro</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="accion" value="agregar">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Agregar</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "editar"): ?>
    <?php
        // Buscar el registro a editar en el array
        $registro_editar = null;
        foreach ($registros as $registro) {
            if ($registro["id"] == $_POST["id"]) {
                $registro_editar = $registro;
                break;
            }
        }
    ?>
    <h2>Editar registro</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $registro_editar["id"] ?>">
        <input type="hidden" name="accion" value="actualizar">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= $registro_editar["nombre"] ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $registro_editar["email"] ?>" required>
        <button type="submit">Actualizar</button>
    </form>
    <?php endif; ?>
</body>
</html>