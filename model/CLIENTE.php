<?php
    class Cliente extends Conectar{
        // LISTAR CLIENTE x EMPRESA
        public function get_cliente_x_emp($emp){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_empresa(:emp)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR CLIENTE
        public function get_cliente_create($emp,$cliente,$ruc,$tlf,$direc,$email){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_c(:emp,:cliente,:ruc,:tlf,:direc,:email)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->bindValue(':cliente', $cliente, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->bindValue(':tfl', $tlf, PDO::PARAM_STR);
            $query->bindValue(':direc', $direc, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
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
        public function get_cliente_update($cod,$emp,$cliente,$ruc,$tlf,$direc,$email){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_cliente_u(:cod,:emp,:cliente,:ruc,:tlf,:direc,:email)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->bindValue(':cliente', $cliente, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->bindValue(':tlf', $tlf, PDO::PARAM_STR);
            $query->bindValue(':direc', $direc, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
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