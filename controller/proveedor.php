<?php
require_once("../config/conectar.php");
require_once("../model/PROVEEDOR.php");

    $proveedor = new Proveedor();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $proveedor->get_proveedor_create(
                    $_POST["emp"],
                    $_POST["prov"],
                    $_POST["ruc"],
                    $_POST["tlf"],
                    $_POST["direc"],
                    $_POST["email"]);
            }else{
                $proveedor->get_proveedor_update(
                $_POST["cod"],
                $_POST["emp"],
                $_POST["prov"],
                $_POST["ruc"],
                $_POST["tlf"],
                $_POST["direc"],
                $_POST["email"]);
            }
            break;

        case "listar":
                $datos   = $proveedor->get_proveedor_x_emp($_POST["emp"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["prov"];
                    $sub_array = $row["ruc"];
                    $sub_array = $row["tlf"];
                    $sub_array = $row["direc"];
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
                $datos = $proveedor->get_proveedor_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $proveedor->get_proveedor_delete($_POST["cod"]);
            break;
    }
?>