<?php
    class Sucursal extends Conectar{
        // LISTAR SUCURSAL x EMPRESA
        public function get_sucursal_x_suc($emp){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_sucursal_sucursal(:emp)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':emp', $emp, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR SUCURSAL
        public function get_sucursal_create($emp,$sucursal,){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_sucursal_c(:suc, :sucursal, )";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $emp, PDO::PARAM_INT);
            $query->bindValue(':cod', $sucursal, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR SUCURSAL X ID
        public function get_sucursal_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_sucursal_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR SUCURSAL
        public function get_sucursal_update($cod,$sucursal){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_sucursal_u(:cod,:suc, :sucursal)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':cod', $sucursal, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR SUCURSAL
        public function get_sucursal_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_sucursal_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>