<?php
include "./clases/Conexion.php";
include "./clases/Crud.php";
include "./header.php";

$crud = new Crud();
$id = $_POST['id'] ?? null;

if (!$id) {
  die("<div style='color:red; padding:10px;'> Error: No se recibió un ID válido.</div>");
}

$datos = $crud->obtenerDocumento($id);
if (!$datos) {
  die("<div style='color:red; padding:10px;'>No se encontró el registro solicitado.</div>");
}
?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-4 fondoDelete">
        <div class="card-body">

          <a href="index.php" class="btn btn-outline-info">
            <i class="fa-solid fa-angles-left"></i> Regresar
          </a>

          <h2>Eliminar registro</h2>

          <table class="table table-bordered mt-3">
            <thead>
              <tr>
                <th>Nombre de la mascota</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Nombre del dueño</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $datos->nombre; ?></td>
                <td><?php echo $datos->especie; ?></td>
                <td><?php echo $datos->raza; ?></td>
                <td><?php echo $datos->edad; ?></td>
                <td><?php echo $datos->nombre_dueno; ?></td>
              </tr>
            </tbody>
          </table>

          <div class="alert alert-danger mt-3">
            <strong>Atención:</strong> ¿Está seguro de eliminar este registro?  
            Una vez eliminado no podrá recuperarlo.
          </div>

          <form action="./procesos/eliminar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $datos->_id; ?>">
            <button class="btn btn-danger">
              <i class="fa-solid fa-user-xmark"></i> Eliminar
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include "./scripts.php"; ?>
