<?php
    class Categoria extends Conectar{
        // LISTAR CATEGORIA x SUCURSAL
        public function get_categoria_x_suc($suc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_categoria_sucursal(:suc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR CATEGORIA
        public function get_categoria_create($suc,$cat){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_categoria_c(:suc, :cat)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $suc, PDO::PARAM_INT);
            $query->bindValue(':cod', $cat, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR CATEGORIA X ID
        public function get_categoria_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_categoria_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR CATEGORIA
        public function get_categoria_update($cod,$suc,$cat){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_categoria_u(:cod,:suc, :cat)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':cod', $suc, PDO::PARAM_INT);
            $query->bindValue(':cod', $cat, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR CATEGORIA
        public function get_categoria_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_categoria_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>