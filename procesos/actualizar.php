<?php
session_start();
require_once __DIR__ . "/../clases/Conexion.php";
require_once __DIR__ . "/../clases/Crud.php";

$Crud = new Crud();
$id = $_POST['id'];
$datos = [
    "nombre" => $_POST['nombre'],
    "especie" => $_POST['especie'],
    "raza" => $_POST['raza'],
    "edad" => $_POST['edad'],
    "nombre_dueno" => $_POST['nombre_dueno']
];

$respuesta = $Crud->actualizar($id, $datos);

if ($respuesta && ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0)) {
    $_SESSION['mensaje_crud'] = 'update';
    header("Location: ../index.php");
} else {
    echo "❌ No se modificó ningún registro.";
}
?>
