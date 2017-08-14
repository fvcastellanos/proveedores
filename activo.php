<?php
    require_once ('servicio/ProveedorServicio.php');

    $servicio = new ProveedorServicio();

    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $servicio->cambiarEstadoProveedor($id);

        header("location: index.php");
    }

