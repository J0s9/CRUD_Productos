<?php
require_once("../config/conectar.php");
require_once("../model/COMPANIA.php");

    $compania = new Compania();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $compania->get_compania_create($_POST["suc"],$_POST["cmp"]);
            }else{
                $compania->get_compania_update($_POST["cod"],$_POST["suc"],$_POST["cmp"]);
            }
            break;

        case "listar":
                $datos   = $compania->get_compania($_POST["suc"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["cmp"];
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
                $datos = $compania->get_compania_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $compania->get_compania_delete($_POST["cod"]);
            break;
    }
?>