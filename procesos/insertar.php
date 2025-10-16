<?php
session_start();
require_once __DIR__ . "/../clases/Conexion.php";
require_once __DIR__ . "/../clases/Crud.php";

$Crud = new Crud();

$datos = [
    "nombre" => $_POST['nombre'],
    "especie" => $_POST['especie'],
    "raza" => $_POST['raza'],
    "edad" => $_POST['edad'],
    "nombre_dueno" => $_POST['nombre_dueno']
];

$respuesta = $Crud->insertarDatos($datos);

if ($respuesta && $respuesta->getInsertedCount() > 0) {
    $_SESSION['mensaje_crud'] = 'insert';
    header("Location: ../index.php");
} else {
    echo "Error al insertar el registro.";
}
?>
