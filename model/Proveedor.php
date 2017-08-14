<?php

    class Proveedor {
        public $id = 0;
        public $nit = "";
        public $nombre = "";
        public $telefono = "";
        public $departamento ="";
        public $activo = 1;

        function __construct($id, $nit, $nombre, $telefono, $departamento, $estado) {
            $this->id = $id;
            $this->nit = $nit;
            $this->nombre = $nombre;
            $this->telefono = $telefono;
            $this->departamento = $departamento;
            $this->estado = $estado;
        }

    }
?>

