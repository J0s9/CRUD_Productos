<?php
    class Proveedor extends Conectar{
        // LISTAR PROVEEDOR x EMPRESA
        public function get_proveedor_x_emp($emp){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_proveedor_empresa(:emp)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR PROVEEDOR
        public function get_proveedor_create($emp,$prov,$ruc,$tlf,$direc,$email){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_proveedor_c(:emp,:prov,:ruc,:tlf,:direc,:email)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->bindValue(':prov', $prov, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->bindValue(':tfl', $tlf, PDO::PARAM_STR);
            $query->bindValue(':direc', $direc, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR PROVEEDOR X ID
        public function get_proveedor_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_proveedor_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR PROVEEDOR
        public function get_proveedor_update($cod,$emp,$proveedor,$ruc,$tlf,$direc,$email){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_proveedor_u(:cod,:emp,:proveedor,:ruc,:tlf,:direc,:email)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->bindValue(':proveedor', $proveedor, PDO::PARAM_STR);
            $query->bindValue(':ruc', $ruc, PDO::PARAM_STR);
            $query->bindValue(':tlf', $tlf, PDO::PARAM_STR);
            $query->bindValue(':direc', $direc, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR PROVEEDOR
        public function get_proveedor_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_proveedor_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>