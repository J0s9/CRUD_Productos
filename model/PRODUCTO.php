<?php
    class Producto extends Conectar{
        // LISTAR PRODUCTO x SUCURSAL
        public function get_producto_x_suc($suc){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_producto_sucursal(:suc)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // INSERTAR PRODUCTO
        public function get_producto_create($suc,$cat,$prod,$descr,$medida,$moneda,$p_compra,$p_venta,$stock,$caduce,$img){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_producto_c(:suc,:prod,:descr,:med,:mon,:p_compra,:p_venta,:stk,:caduce)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->bindValue(':cat', $cat, PDO::PARAM_INT);
            $query->bindValue(':prod', $prod, PDO::PARAM_STR);
            $query->bindValue(':descr', $descr, PDO::PARAM_STR);
            $query->bindValue(':med', $medida, PDO::PARAM_STR);
            $query->bindValue(':mon', $moneda, PDO::PARAM_STR);
            $query->bindValue(':p_compra', $p_compra, PDO::PARAM_STR);
            $query->bindValue(':p_venta', $p_venta, PDO::PARAM_STR);
            $query->bindValue(':stk', $stock, PDO::PARAM_STR);
            $query->bindValue(':caduce', $caduce, PDO::PARAM_STR);
            $query->bindValue(':img', $img, PDO::PARAM_STR);
            $query->execute();
        }
        // LISTAR PRODUCTO X ID
        public function get_producto_read($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_producto_r(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        // ACTUALIZAR PRODUCTO
        public function get_producto_update($code,$suc,$cat,$prod,$descr,$medida,$moneda,$p_compra,$p_venta,$stock,$caduce,$img){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_producto_u(:suc,:prod,:descr,:med,:mon,:p_compra,:p_venta,:stk,:caduce)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':code', $code, PDO::PARAM_INT);
            $query->bindValue(':suc', $suc, PDO::PARAM_INT);
            $query->bindValue(':cat', $cat, PDO::PARAM_INT);
            $query->bindValue(':prod', $prod, PDO::PARAM_STR);
            $query->bindValue(':descr', $descr, PDO::PARAM_STR);
            $query->bindValue(':med', $medida, PDO::PARAM_STR);
            $query->bindValue(':mon', $moneda, PDO::PARAM_STR);
            $query->bindValue(':p_compra', $p_compra, PDO::PARAM_STR);
            $query->bindValue(':p_venta', $p_venta, PDO::PARAM_STR);
            $query->bindValue(':stk', $stock, PDO::PARAM_STR);
            $query->bindValue(':caduce', $caduce, PDO::PARAM_STR);
            $query->bindValue(':img', $img, PDO::PARAM_STR);
        }
        // ELIMINAR PRODUCTO
        public function get_producto_delete($cod){
            $conectar = parent::Conexion();
            $sql   = "SELECT func_producto_d(:cod)";
            $query = $conectar->prepare($sql);
            $query->bindValue(':cod', $cod, PDO::PARAM_INT);
            $query->execute();
        }
    }
?>