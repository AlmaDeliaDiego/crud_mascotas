<?php
class Crud {
    public function mostrarDatos() {
        try {
            $conexion = Conexion::conectar();
            $coleccion = $conexion->mascotas;
            return $coleccion->find();
        } catch (\Throwable $th) {
            echo "Error al mostrar datos: " . $th->getMessage();
            return [];
        }
    }

    public function obtenerDocumento($id) {
        try {
            $conexion = Conexion::conectar();
            $coleccion = $conexion->mascotas;
            return $coleccion->findOne([
                '_id' => new MongoDB\BSON\ObjectId($id)
            ]);
        } catch (\Throwable $th) {
            echo "Error al obtener documento: " . $th->getMessage();
            return null;
        }
    }

    public function insertarDatos($datos) {
        try {
            $conexion = Conexion::conectar();
            $coleccion = $conexion->mascotas;
            return $coleccion->insertOne($datos);
        } catch (\Throwable $th) {
            echo "Error al insertar: " . $th->getMessage();
            return null;
        }
    }

    public function eliminar($id) {
        try {
            $conexion = Conexion::conectar();
            $coleccion = $conexion->mascotas;
            return $coleccion->deleteOne([
                "_id" => new MongoDB\BSON\ObjectId($id)
            ]);
        } catch (\Throwable $th) {
            echo "Error al eliminar: " . $th->getMessage();
            return null;
        }
    }

    public function actualizar($id, $datos) {
        try {
            $conexion = Conexion::conectar();
            $coleccion = $conexion->mascotas;
            return $coleccion->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => $datos]
            );
        } catch (\Throwable $th) {
            echo "Error al actualizar: " . $th->getMessage();
            return null;
        }
    }

    public function mensajesCrud($mensaje) {
        switch ($mensaje) {
            case 'insert': return 'swal("Excelente!", "Agregado con éxito!", "success")';
            case 'update': return 'swal("Excelente!", "Actualizado con éxito!", "info")';
            case 'delete': return 'swal("Excelente!", "Eliminado con éxito!", "warning")';
            default: return '';
        }
    }
}
?>
