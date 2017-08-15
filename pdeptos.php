<?php

    require_once('model/Proveedor.php');
    require_once('servicio/ProveedorServicio.php');

    $servicio = new ProveedorServicio();
    $proveedores = $servicio->obtenerProveedoresPorDepto();
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Proveedores</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<h1>Proveedores por departamento</h1>
<nav>
    <a href="index.php">Regresar</a>
</nav>
<main>
    <table>
        <thead>
        <tr>
            <th>Departamento</th>
            <th>No. Proveedores</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($proveedores as $proveedor) {
            ?>
            <tr>
                <td><?php echo $proveedor->departamento ?></td>
                <td><?php echo $proveedor->proveedores ?></td>
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
