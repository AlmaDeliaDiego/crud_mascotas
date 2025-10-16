<?php
include "./clases/Conexion.php";
include "./clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'] ?? null;

if (!$id) {
  die("<div style='color:red; padding:10px;'>Error: No se recibió un ID válido.</div>");
}

$datos = $crud->obtenerDocumento($id);
if (!$datos) {
  die("<div style='color:red; padding:10px;'> No se encontró el registro solicitado.</div>");
}

$idMongo = $datos->_id;
?>

<?php include "./header.php"; ?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-4">
        <div class="card-body">

          <a href="index.php" class="btn btn-outline-info">
            <i class="fa-solid fa-angles-left"></i> Regresar
          </a>

          <h2>Actualizar registro</h2>

          <form action="./procesos/actualizar.php" method="POST">
            <input type="hidden" value="<?php echo $idMongo ?>" name="id">

            <label for="nombre">Nombre de la mascota</label>
            <input type="text" class="form-control" id="nombre" name="nombre" 
                   value="<?php echo $datos->nombre ?? ''; ?>" required>

            <label for="especie">Especie</label>
            <input type="text" class="form-control" id="especie" name="especie"
                   value="<?php echo $datos->especie ?? ''; ?>" required>

            <label for="raza">Raza</label>
            <input type="text" class="form-control" id="raza" name="raza"
                   value="<?php echo $datos->raza ?? ''; ?>" required>

            <label for="edad">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad"
                   value="<?php echo $datos->edad ?? ''; ?>" required>

            <label for="nombre_dueno">Nombre del dueño</label>
            <input type="text" class="form-control" id="nombre_dueno" name="nombre_dueno"
                   value="<?php echo $datos->nombre_dueno ?? ''; ?>" required>

            <button class="btn btn-warning mt-3">
              <i class="fa-solid fa-floppy-disk"></i> Actualizar
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include "./scripts.php"; ?>
