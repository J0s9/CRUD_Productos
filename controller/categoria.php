<?php
require_once("../config/conectar.php");
require_once("../model/CATEGORIA.php");

    $categoria = new Categoria();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $categoria->get_categoria_create($_POST["suc"],$_POST["cat"]);
            }else{
                $categoria->get_categoria_update($_POST["cod"],$_POST["suc"],$_POST["cat"]);
            }
            break;

        case "listar":
                $datos   = $categoria->get_categoria_x_suc($_POST["suc"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["cat"];
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
                $datos = $categoria->get_categoria_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $categoria->get_categoria_delete($_POST["cod"]);
            break;
    }
?>