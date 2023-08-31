<?php
require_once("../../../autoload.php");
require_once("../../controller/tasksController.php");
$class = "../../model/tasks.php";

use app\controller\tasksController;
$tasksController = new tasksController();
$listado = $tasksController->listarTareas();
$contenido = '';
foreach($listado as $list) : 
  if ($list['completada'] == 1){
    $check = "checked";
  }else{
    $check = "";
  }
    $contenido.='

    
    <tr>
      <th scope="row">'. $list['id'] .'</th>
      <td>'. $list['tarea'] .'</td>
      <td>'. $list['completada'] .'</td>

      <td>
       <input class="form-check-input mt-2" type="checkbox" value="'.$list['id'].'/'.$list['completada'].'" '.$check.' id="flexCheckDefault">
  <label class="form-check-label"  for="flexCheckDefault">
  Completada</label>
        <button class=" btn btn-danger p-1 btnEliminar" value='.$list['id'].'> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg> Eliminar</button>
      </td>
      
    </tr>';
   
    endforeach; 
    echo $contenido; ?>

