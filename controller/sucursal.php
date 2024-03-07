<?php
require_once("../config/conectar.php");
require_once("../model/SUCURSAL.php");

    $sucursal = new Sucursal();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $sucursal->get_sucursal_create($_POST["emp"],$_POST["suc"]);
            }else{
                $sucursal->get_sucursal_update($_POST["cod"],$_POST["suc"]);
            }
            break;

        case "listar":
                $datos   = $sucursal->get_sucursal_x_suc($_POST["emp"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["suc"];
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
                $datos = $sucursal->get_sucursal_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $sucursal->get_sucursal_delete($_POST["cod"]);
            break;
    }
?>