<?php
/**
 * Archivo de controlador para las operaciones relacionadas con los productos.
 */

header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Producto.php");

$producto = new Producto(); // Instancia de la clase Producto

$body = json_decode(file_get_contents("php://input"), true); // Decodifica el cuerpo de la solicitud JSON

// Manejo de servicios
switch($_GET["op"]){
    // Obtener todos los productos
    case "GetAllProducto":
        $datos=$producto->get_productos();
        echo json_encode($datos);
    break;

    // Insertar un nuevo producto
    case "InsertProducto":
        $datos=$producto->insert_producto($body["pro_nom"],$body["pro_obs"],$body["cat_id"]); 
        echo json_encode("Se ha insertado el producto");
    break;
}
?>
