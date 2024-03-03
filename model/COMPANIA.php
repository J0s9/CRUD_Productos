<?php
    class Compania extends Conectar{
        // INSERTAR COMPANIA
        public function get_compania_create($compania){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_compania_c(:compania)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $compania, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR COMPANIA X ID
        public function get_compania_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_compania_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR COMPANIA
        public function get_compania_update($cod,$compania){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_compania_u(:cod,:compania)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':compania', $compania, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR COMPANIA
        public function get_compania_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_compania_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>