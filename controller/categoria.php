<?php
/**
 * Archivo de controlador para las operaciones relacionadas con las categorías.
 */

header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Categoria.php");

$categoria = new Categoria(); // Instancia de la clase Categoria

$body = json_decode(file_get_contents("php://input"), true); // Decodifica el cuerpo de la solicitud JSON

// Manejo de servicios
switch($_GET["op"]){

    // Obtener todas las categorías
    case "GetAll":
        $datos=$categoria->get_categoria();
        echo json_encode($datos);
    break;

    // Obtener una categoría por su ID
    case "GetId":
        $datos=$categoria->get_categoria_x_id($body["cat_id"]); 
        echo json_encode($datos);
    break;

    // Insertar una nueva categoría
    case "Insert":
        $datos=$categoria->insert_categoria($body["cat_nom"],$body["cat_obs"]); 
        echo json_encode("Se ha insertado la categoría");
    break;

    // Actualizar una categoría existente
    case "Update":
        $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"],$body["cat_obs"]); 
        echo json_encode("Se ha actualizado la categoría");
    break;

    // Eliminar una categoría
    case "Delete":
        $datos=$categoria->delete_categoria($body["cat_id"]); 
        echo json_encode("Se ha eliminado la categoría");
    break;
}

?>
