<?php
    class Cliente extends Conectar{
        // LISTAR CLIENTE x EMPRESA
        public function get_cliente_x_cmp($emp){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_empresa(:cmp)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR CLIENTE
        public function get_cliente_create($cmp,$cliente,$ruc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_c(:cmp, :cliente, :ruc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cmp', $cmp, PDO::PARAM_INT);
            $query->bindValue(':cod', $cliente, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR CLIENTE X ID
        public function get_cliente_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR CLIENTE
        public function get_cliente_update($cod,$cliente,$ruc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_u(:cod,:cliente,:ruc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':cliente', $cliente, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR CLIENTE
        public function get_cliente_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>