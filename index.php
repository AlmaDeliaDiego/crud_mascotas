<?php 
session_start();
include "./clases/Conexion.php";
include "./clases/Crud.php";

$crud = new Crud();
$datos = $crud->mostrarDatos();
?>
<?php include "./header.php";?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2>Crud con MongoDB y PHP</h2>
            <a href="./agregar.php" class="btn btn-primary">Agregar nuevo registro</a>
            <hr>

            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <th>Nombre de la mascota</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Nombre del dueño</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    <?php foreach ($datos as $item): ?>
                        <tr>
                            <td><?= $item->nombre ?? '' ?></td>
                            <td><?= $item->especie ?? '' ?></td>
                            <td><?= $item->raza?? '' ?></td>
                            <td><?= $item->edad ?? '' ?></td>
                            <td><?= $item->nombre_dueno ?? '' ?></td>
                            <td>
                                <form action="./actualizar.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $item->_id ?>">
                                    <button class="btn btn-warning">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="./eliminar.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $item->_id ?>">
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
