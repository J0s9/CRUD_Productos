<?php
    class Usuario extends Conectar{
        // LISTAR USUARIO x SUCRESA
        public function get_usuario_x_suc($suc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_usuario_sucursal(:suc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR USUARIO
        public function get_usuario_create($suc,$nombre,$apellido,$email,$dni,$tlf,$pass,$rol){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_usuario_c(:suc,:nom,:apell,:email,:dni,:tlf,:pass,:rol)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->bindValue(':nom', $nombre, PDO::PARAM_STR);
            $query->bindValue(':apell', $apellido, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':dni', $dni, PDO::PARAM_STR);
            $query->bindValue(':tlf', $tlf, PDO::PARAM_STR);
            $query->bindValue(':pass', $pass, PDO::PARAM_STR);
            $query->bindValue(':rol', $rol, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR USUARIO X ID
        public function get_usuario_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_usuario_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR USUARIO
        public function get_usuario_update($cod,$suc,$nombre,$apellido,$email,$dni,$tlf,$pass,$rol){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_usuario_u(:cod,:suc,:nom,:apell,:email,:dni,:tlf,:pass,:rol)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->bindValue(':nom', $nombre, PDO::PARAM_STR);
            $query->bindValue(':apell', $apellido, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':dni', $dni, PDO::PARAM_STR);
            $query->bindValue(':tlf', $tlf, PDO::PARAM_STR);
            $query->bindValue(':pass', $pass, PDO::PARAM_STR);
            $query->bindValue(':rol', $rol, PDO::PARAM_STR);
            $query->execute();
        }
        // ELIMINAR USUARIO
        public function get_usuario_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_usuario_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>