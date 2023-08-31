<?php 
require_once ('./autoload.php');
require_once("app/controller/tasksController.php"); 
use App\Controller\tasksController;




?>

<!doctype html>
<html lang="en">

<head>
  <title>Sisma Tareas</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link rel="stylesheet" href="app/view/assets/css/bootstrap/bootstrap.min.css">
  <script src="app/view/assets/js/bootstrap/bootstrap.bundle.js"></script>



</head>

<body>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h1 class="text-center mb-3">Agenda tu tarea</h1>
      
      <div class="bg-dark p-5 rounded-4 shadow border border-white border-5">
        <form method="post" action="" id="formAgregar">
          <div class="mb-3">
            <label for="tarea" class="form-label text-light fs-5">Tarea</label>
            <input type="text" class="form-control" name="tarea" id="tarea" aria-describedby="tareaHelp" required>
          </div>
          
          <div class="text-center">
            <button class="btn btn-light btn-lg fw-bolder" id="agregar" name="agregar" type="submit">Agregar</button>
          </div>
          <?php if(isset($_GET["Respuesta"]) && $_GET["Respuesta"] != "") {
            echo "Registro exitoso.";
          };?>
        </form>
      </div>

    </div>
  </div>


  <h3 class="mt-4">Listado de tareas</h3>
  <table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tarea</th>
      <th scope="col">Estado</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody  id="tablaContent" class="table-group-divider">
   
  </tbody>
</table>
</div>


</body>

<script src="app/view/assets/js/jQuery/code.jquery.com_jquery-3.7.0.min.js"></script>
<script src="app/view/assets/js/jQuery/jquery.js"></script>
  </html>

  