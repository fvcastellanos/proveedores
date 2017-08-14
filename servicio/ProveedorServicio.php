<?php

    require_once('model/Proveedor.php');
    require_once('dao/ProveedorDao.php');

    class ProveedorServicio {

        private $proveedorDao;

        public function __construct() {
            $this->proveedorDao = new ProveedorDao();
        }

        public function mostrarProveedores() {
            $proveedores = $this->proveedorDao->obtenerProveedores();

            return $proveedores;
        }

        public function agregarProveedor($nit, $nombre, $telefono, $departamento) {
            $this->proveedorDao->agregarProveedor($nit, $nombre, $telefono, $departamento, 1);
        }

        public function obtenerProveedoresActivos() {
            $proveedores = $this->proveedorDao->obtenerProveedoresPorEstado(1);

            return $proveedores;
        }
    }

?>