<?php

    require_once('model/Proveedor.php');
    require_once('servicio/ProveedorServicio.php');

    $servicio = new ProveedorServicio();

    $proveedores = $servicio->mostrarProveedores();
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Proveedores</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Mantenimiento de Proveedores</h1>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="nuevo.php">Nuevo</a></li>
            <li><a href="activos.php">Ver activos</a></li>
            <li><a href="pdeptos.php">Proveedores por Departamento</a></li>
        </ul>
    </nav>
    <main>
        <table>
            <thead>
                <tr>
                    <th>A/I</th>
                    <th>Nit</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Departamento</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($proveedores as $proveedor) {
                ?>
                    <tr>
                        <td><a href="activo.php?id=<?php echo $proveedor->id ?>">A/I</a></td>
                        <td><?php echo $proveedor->nit ?></td>
                        <td><?php echo $proveedor->nombre ?></td>
                        <td><?php echo $proveedor->telefono ?></td>
                        <td><?php echo $proveedor->departamento ?></td>
                        <td><?php echo $proveedor->activo==1?'Activo':'Inactivo' ?></td>
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
