<?php 
require_once "/home/alma/crud_php_mongodb/vendor/autoload.php";
class Conexion {
    public static function conectar() {
        try {
            $servidor = "127.0.0.1";
            $puerto = "27017";
            $usuario = "mongoadmin";
            $password = "123456";
            $BD = "animales";

            $cadenaConexion = "mongodb://$usuario:$password@$servidor:$puerto/$BD?authSource=$BD";

            $cliente = new MongoDB\Client($cadenaConexion);
            return $cliente->selectDatabase($BD);
        } catch (\Throwable $th) {
            die(" Error de conexión: " . $th->getMessage());
        }
    }
}
?>
