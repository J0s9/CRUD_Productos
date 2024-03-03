<?php
    class Clientes extends Conectar{
        // LISTAR CLIENTES x COMPANIA
        public function get_clientes_x_cmp($cmp){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_clientes_sucursal(:cmp)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cmp', $cmp, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR CLIENTES
        public function get_clientes_create($cmp,$clientes,$ruc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_clientes_c(:cmp, :clientes, :ruc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cmp', $cmp, PDO::PARAM_INT);
            $query->bindValue(':cod', $clientes, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR CLIENTES X ID
        public function get_clientes_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_clientes_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR CLIENTES
        public function get_clientes_update($cod,$clientes,$ruc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_clientes_u(:cod,:clientes,:ruc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':clientes', $clientes, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR CLIENTES
        public function get_clientes_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_clientes_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>