<?php
session_start();
require_once __DIR__ . "/../clases/Conexion.php";
require_once __DIR__ . "/../clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];
$respuesta = $crud->eliminar($id);

if ($respuesta && $respuesta->getDeletedCount() > 0) {
    $_SESSION['mensaje_crud'] = 'delete';
    header("Location: ../index.php");
} else {
    echo "❌ Error al eliminar el registro.";
}
?>
