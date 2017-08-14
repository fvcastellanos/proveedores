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

        public function obtenerProveedoresPorDepto() {
            $proveedores = $this->proveedorDao->obtenerConteoPorDepto();

            return $proveedores;
        }

        public function cambiarEstadoProveedor($id) {
            $proveedor = $this->proveedorDao->obtenerPorId($id);

            if ($proveedor != null) {
                $activo = 1;
                if ($proveedor->activo == 1) {
                    $activo = 0;
                }

                $this->proveedorDao->cambiarEstadoProveedor($id, $activo);
            }
        }
    }
