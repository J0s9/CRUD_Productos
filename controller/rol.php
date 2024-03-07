<?php
require_once("../config/conectar.php");
require_once("../model/ROL.php");

    $rol = new Rol();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $rol->get_rol_create($_POST["suc"],$_POST["rol"]);
            }else{
                $rol->get_rol_update($_POST["cod"],$_POST["suc"],$_POST["rol"]);
            }
            break;

        case "listar":
                $datos   = $rol->get_rol_x_suc($_POST["suc"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["rol"];
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
                $datos = $rol->get_rol_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $rol->get_rol_delete($_POST["cod"]);
            break;
    }
?>