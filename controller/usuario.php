<?php
require_once("../config/conectar.php");
require_once("../model/USUARIO.php");

    $usuario = new Usuario();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $usuario->get_usuario_create(
                    $_POST["suc"],
                    $_POST["nom"],
                    $_POST["apell"],
                    $_POST["email"],
                    $_POST["dni"],
                    $_POST["tlf"],
                    $_POST["pass"],
                    $_POST["rol"]);
            }else{
                $usuario->get_usuario_update(
                    $_POST["cod"],
                    $_POST["suc"],
                    $_POST["nom"],
                    $_POST["apell"],
                    $_POST["email"],
                    $_POST["dni"],
                    $_POST["tlf"],
                    $_POST["pass"],
                    $_POST["rol"]);
            }
            break;

        case "listar":
                $datos   = $usuario->get_usuario_x_suc($_POST["suc"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["nom"];
                    $sub_array = $row["apell"];
                    $sub_array = $row["email"];
                    $sub_array = $row["dni"];
                    $sub_array = $row["tlf"];
                    $sub_array = $row["pass"];
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
                $datos = $usuario->get_usuario_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $usuario->get_usuario_delete($_POST["cod"]);
            break;
    }
?>