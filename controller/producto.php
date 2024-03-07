<?php
require_once("../config/conectar.php");
require_once("../model/PRODUCTO.php");

    $producto = new Producto();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $producto->get_producto_create(
                    $_POST["suc"],
                    $_POST["cat"],
                    $_POST["prod"],
                    $_POST["descr"],
                    $_POST["medida"],
                    $_POST["moneda"],
                    $_POST["p_compra"],
                    $_POST["p_venta"],
                    $_POST["stock"],
                    $_POST["caduce"],
                    $_POST["img"]);
            }else{
                $producto->get_producto_update(
                    $_POST["cod"],
                    $_POST["suc"],
                    $_POST["cat"],
                    $_POST["prod"],
                    $_POST["descr"],
                    $_POST["medida"],
                    $_POST["moneda"],
                    $_POST["p_compra"],
                    $_POST["p_venta"],
                    $_POST["stock"],
                    $_POST["caduce"],
                    $_POST["img"]);
            }
            break;

        case "listar":
                $datos   = $producto->get_producto_x_suc($_POST["suc"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["cat"];
                    $sub_array = $row["prod"];
                    $sub_array = $row["descr"];
                    $sub_array = $row["medida"];
                    $sub_array = $row["moneda"];
                    $sub_array = $row["p_compra"];
                    $sub_array = $row["p_venta"];
                    $sub_array = $row["stock"];
                    $sub_array = $row["caduce"];
                    $sub_array = $row["img"];
                    $sub_array = "Editar";
                    $sub_array = "Eliminar";
                    $data[]    = $sub_array;
                }
                $results = array(
                    "sEcho" => 1,
                    "iTotalRecords" => count($data),
                    "iTotalDisplayRecords" => count($data),
                    "aaDatos" => $data
                );
                echo json_encode($results);
            break;

        case "mostrar":
                $datos = $producto->get_producto_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $producto->get_producto_delete($_POST["cod"]);
            break;
    }
?>