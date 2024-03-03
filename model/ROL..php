<?php
    class Rol extends Conectar{
        // LISTAR ROL x SUCURSAL
        public function get_rol_x_suc($suc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_rol_sucursal(:suc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR ROL
        public function get_rol_create($suc,$rol){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_rol_c(:suc, :rol)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $suc, PDO::PARAM_INT);
            $query->bindValue(':rol', $rol, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR ROL X ID
        public function get_rol_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_rol_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR ROL
        public function get_rol_update($cod,$suc,$rol){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_rol_u(:cod,:suc, :rol)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->bindValue(':rol', $rol, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR ROL
        public function get_rol_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_rol_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>