<?php
    class Empresa extends Conectar{
        // LISTAR EMPRESA x COMPANIA
        public function get_empresa_x_cmp($cmp){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_empresa_sucursal(:cmp)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cmp', $cmp, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR EMPRESA
        public function get_empresa_create($cmp,$empresa,$ruc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_empresa_c(:cmp, :empresa, :ruc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cmp', $cmp, PDO::PARAM_INT);
            $query->bindValue(':cod', $empresa, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR EMPRESA X ID
        public function get_empresa_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_empresa_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR EMPRESA
        public function get_empresa_update($cod,$empresa,$ruc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_empresa_u(:cod,:empresa,:ruc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':empresa', $empresa, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR EMPRESA
        public function get_empresa_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_empresa_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>