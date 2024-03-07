<?php
require_once("../config/conectar.php");
require_once("../model/EMPRESA.php");

    $empresa = new Empresa();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $empresa->get_empresa_create($_POST["cmp"],$_POST["emp"],$_POST["ruc"]);
            }else{
                $empresa->get_empresa_update($_POST["cod"],$_POST["emp"],$_POST["ruc"]);
            }
            break;

        case "listar":
                $datos   = $empresa->get_empresa_x_cmp($_POST["cmp"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["emp"];
                    $sub_array = $row["ruc"];
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
                $datos = $empresa->get_empresa_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $empresa->get_empresa_delete($_POST["cod"]);
            break;
    }
?>