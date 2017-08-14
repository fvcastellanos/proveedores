<?php

class ConteoDepto
{
    public $departamento;
    public $proveedores;

    public function __construct($departamento, $proveedores) {
        $this->departamento = $departamento;
        $this->proveedores = $proveedores;
    }
}