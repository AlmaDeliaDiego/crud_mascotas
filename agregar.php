<?php
include "./clases/Conexion.php";
include "./clases/Crud.php";

?>
<?php include "./header.php";?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-4">
        <div class="card-body">

          <a href="index.php" class="btn btn-outline-info mb-3">
            <i class="fa-solid fa-angles-left"></i> Regresar
          </a>

          <h2 class="mb-4">Agregar nueva mascota</h2>

          <form action="./procesos/agregar.php" method="POST">

            <label for="nombre" class="form-label">Nombre de la mascota</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>

            <label for="especie" class="form-label mt-2">Especie</label>
            <input type="text" class="form-control" id="especie" name="especie" required>

            <label for="raza" class="form-label mt-2">Raza</label>
            <input type="text" class="form-control" id="raza" name="raza" required>

            <label for="edad" class="form-label mt-2">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" required>

            <label for="nombre_dueno" class="form-label mt-2">Nombre del dueño</label>
            <input type="text" class="form-control" id="nombre_dueno" name="nombre_dueno" required>

            <button class="btn btn-success mt-4">
              <i class="fa-solid fa-plus"></i> Agregar
            </button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include "./scripts.php"; ?>
