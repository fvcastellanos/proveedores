<?php

    require_once('servicio/ProveedorServicio.php');

    if (isset($_POST['nit'])) {
        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $departamento = $_POST['departamento'];

        $servicio = new ProveedorServicio();
        $servicio->agregarProveedor($nit, $nombre, $telefono, $departamento);

        header("location: index.php");
    }

?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Proveedores</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <h1>Nuevo Proveedor</h1>
    <header>
        <nav>
            <a href="index.php">Regresar</a>
        </nav>
    </header>
    <main>
        <form method="post">
            <label for="nit">Nit:</label>
            <input type="text" name="nit" placeholder="Nit" required maxlength="30" />
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" placeholder="Nombre" required maxlength="100" />
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" placeholder="Telefono" maxlength="30" />
            <label for="departamento">Departamento:</label>
            <input type="text" name="departamento" placeholder="Departamento" required maxlength="100" />
            <input type="submit" value="Agregar proveedor" />
        </form>
    </main>
    <footer>

    </footer>
</body>
