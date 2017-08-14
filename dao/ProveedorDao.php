<?php

require_once ('model/Proveedor.php');
require_once ('model/ConteoDepto.php');

class ProveedorDao {
    const DB_HOST = "azura.cavitos.net";
    const DB_USR = "dweb";
    const DB_PWD = "dweb";
    const DB_NAME = "dweb";

    private function crearConexion() : mysqli {
        try {
            $conexion = new mysqli(ProveedorDao::DB_HOST, ProveedorDao::DB_USR,
                ProveedorDao::DB_PWD, ProveedorDao::DB_NAME);

            return $conexion;
        } catch(Exception $e) {
            throw $e;
        }
    }

    public function obtenerProveedores() {
        try {
            $conexion = $this->crearConexion();

            $lista = array();
            $resultado = $conexion->query("select * from proveedor");
            
            if ($resultado) {
                while($fila = $resultado->fetch_assoc()) {
                    $lista[] = new Proveedor($fila['id'], $fila['nit'], $fila['nombre'], $fila['telefono'], 
                        $fila['departamento'], $fila['activo']);
                }
            }

            return $lista;

        } catch(Exception $e) {
            throw $e;
        } finally {
            $conexion->close();
        }
    }

    public function obtenerProveedoresPorEstado($estado) {
        try {
            $lista = array();

            $consulta = "select * from proveedor where activo = ?";
            $conexion = $this->crearConexion();
            $stm = $conexion->prepare($consulta);

            if ($stm) {
                $stm->bind_param("i", $estado);
                $stm->execute();
                $resultado = $stm->get_result();

                while($fila = $resultado->fetch_assoc()) {
                    $lista[] = new Proveedor($fila['id'], $fila['nit'], $fila['nombre'], $fila['telefono'],
                        $fila['departamento'], $fila['activo']);
                }

            }

            return $lista;

        } catch(Exception $e) {
            throw $e;
        } finally {
            if ($stm) {
                $stm->close();
            }
            
            $conexion->close();
        }
    }

    public function agregarProveedor($nit, $nombre, $telefono, $departamento, $activo) {
        try {

            $consulta = "insert into proveedor (nit, nombre, telefono, departamento, activo) " .
                " values (?, ?, ?, ?, ?)";

            $conexion = $this->crearConexion();
            $stm = $conexion->prepare($consulta);

            if ($stm) {
                $stm->bind_param("ssssi", $nit, $nombre, $telefono, $departamento, $activo);
                $stm->execute();
            }

        } catch(Exception $e) {
            throw $e;
        }  finally {
            if ($stm) {
                $stm->close();
            }
            
            $conexion->close();
        }
    }

    public function obtenerPorId($id) {
        try {
            $consulta = "select * from proveedor where id = ?";

            $conexion = $this->crearConexion();
            $stm = $conexion->prepare($consulta);

            if ($stm) {
                $stm->bind_param("i", $id);
                $stm->execute();
                $resultado = $stm->get_result();

                $fila = $resultado->fetch_assoc();
                $proveedor = new Proveedor($fila['id'], $fila['nit'], $fila['nombre'], $fila['telefono'],
                    $fila['departamento'], $fila['activo']);
            }

            return $proveedor;

        } catch(Exception $e) {
            throw $e;
        } finally {
            if ($stm) {
                $stm->close();
            }
            
            $conexion->close();
        }
    }

    public function obtenerConteoPorDepto() {
        try {
            $lista = array();

            $consulta = "select count(departamento) conteo, departamento " .
                "from proveedor " .
                "where activo = 1 " .
                "group by departamento " .
                "order by count(departamento) desc";

            $conexion = $this->crearConexion();
            $stm = $conexion->prepare($consulta);

            if ($stm) {
                $stm->execute();
                $resultado = $stm->get_result();

                while($fila = $resultado->fetch_assoc()) {
                    $lista[] = new ConteoDepto($fila['departamento'], $fila['conteo']);
                }
            }

            return $lista;

        } catch(Exception $e) {
            throw $e;
        } finally {
            if ($stm) {
                $stm->close();
            }

            $conexion->close();
        }
    }

    public function cambiarEstadoProveedor($id, $activo) {
        try {
            $consulta = "update proveedor set activo = ? where id = ?";

            $conexion = $this->crearConexion();
            $stm = $conexion->prepare($consulta);

            if ($stm) {
                $stm->bind_param("ii", $activo, $id);
                $stm->execute();
            }

        } catch (Exception $e) {
            throw $e;
        } finally {
            if ($stm) {
                $stm->close();
            }

            $conexion->close();
        }
    }
}
