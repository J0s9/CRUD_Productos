<?php
require_once("../config/conectar.php");
require_once("../model/CLIENTE.php");

    $cliente = new Cliente();

    switch($_GET["op"]){
        case "guardaryeditar":
            if (empty($_POST["code"])){
                $cliente->get_cliente_create(
                    $_POST["emp"],
                    $_POST["cli"],
                    $_POST["ruc"],
                    $_POST["tlf"],
                    $_POST["direc"],
                    $_POST["email"]);
            }else{
                $cliente->get_cliente_update(
                $_POST["cod"],
                $_POST["emp"],
                $_POST["cli"],
                $_POST["ruc"],
                $_POST["tlf"],
                $_POST["direc"],
                $_POST["email"]);
            }
            break;

        case "listar":
                $datos   = $cliente->get_cliente_x_emp($_POST["emp"]);
                $data   = Array();
                foreach($datos as  $row){
                    $sub_array = array();
                    $sub_array = $row["cli"];
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
                $datos = $cliente->get_cliente_read($_POST["cod"]);
            break;
        
        case "eliminar":
                $cliente->get_cliente_delete($_POST["cod"]);
            break;
    }
?>