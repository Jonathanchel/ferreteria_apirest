<?php
//Encabezado para que PHP reconozca que se van a intercambiar archivos JSON
header('Content-Type: application/json');
//Controlador del API, donde se realizan las operaciones del CRUD

require_once "../config/conexion.php";
require_once "../models/Producto.php";

//Recibir solicitud de la URI
$body = json_decode(file_get_contents("php://input"),true);
//Instanciar el objeto producto 
//Ocupado para realizar las operaciones del API
$producto = new Producto();
// Crear el webservice que realce las acciones del CRUD por medio
// de la API REST, el switch será el encargado de atender las peticiones
switch ($_GET["opcion"]) {
    //1.- Recuperar todos los datos de la tabla productos
    case 'getAll':
        $datos = $producto -> get_producto();
        // Una vez recuperado los datos, se les de formatos json
        echo json_encode($datos);
        break;
    //Para recuperar un registro se ocupa get, que tienen el id del producto
    case "get":
        $datos = $producto -> get_producto_id($body["id"]); //Id de la tabla a consultar
        echo json_encode($datos);
        break;
    //Para insertar un registro se debe mandar los campos en el json
    case "insert":
        //Datos para insertar en la tabla
        $datos = $producto -> insert_producto($body["nombre"],$body["marca"],$body["descripcion"],$body["precio"]); //Id de la tabla a consultar
        echo json_encode("(👍≖‿‿≖)👍 👍(≖‿‿≖👍) PRODUCTO INSERTADO"); 
        break;
        //Actualizar
    case "update":
        $datos = $producto -> update_producto($body["id"],$body["nombre"],$body["marca"],$body["descripcion"],$body["precio"]); //Id de la tabla a consultar
        echo json_encode("(👍≖‿‿≖)👍 👍(≖‿‿≖👍) PRODUCTO ACTUALIZADO");  
        break;
        //Borrar logicamente
    case "delete":
        $datos = $producto -> delete_producto($body["id"]); //Id de la tabla a consultar
        echo json_encode("(👍≖‿‿≖)👍 👍(≖‿‿≖👍) PRODUCTO ELIMINADO LOGICAMENTE"); 
        break;
        //Eliminar definitivamente
    case "kill":
        $datos = $producto -> kill_producto($body["id"]); //Id de la tabla a consultar
        echo json_encode("(👍≖‿‿≖)👍 👍(≖‿‿≖👍) PRODUCTO ELIMINADO PA' SIEMPRE"); 
        break;
        //Recuperar las sucursales
    case "getSucursales":
        $datos = $producto -> get_Sucursales();
        echo json_encode($datos);
        break;
    default:
        echo ("Elija una opción por favor");
        break;
}

?>