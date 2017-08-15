<?php

    require_once('model/Proveedor.php');
    require_once('servicio/ProveedorServicio.php');

    $servicio = new ProveedorServicio();

    $proveedores = $servicio->obtenerProveedoresActivos();
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Proveedores</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Proveedores activos</h1>
<nav>
    <a href="index.php">Regresar</a>
</nav>
<main>
    <table>
        <thead>
        <tr>
            <th>Nit</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Departamento</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($proveedores as $proveedor) {
        ?>
            <tr>
                <td><?php echo $proveedor->nit ?></td>
                <td><?php echo $proveedor->nombre ?></td>
                <td><?php echo $proveedor->telefono ?></td>
                <td><?php echo $proveedor->departamento ?></td>
            </tr>

        <?php
            }
        ?>
        </tbody>
    </table>
</main>
<footer>

</footer>
</body>
