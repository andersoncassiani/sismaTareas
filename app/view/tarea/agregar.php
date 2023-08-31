<?php
require_once("../../../autoload.php");
require_once("../../controller/tasksController.php");
$class = "../../model/tasks.php";

use app\controller\tasksController;
$tasksController = new tasksController();
$listado = $tasksController->guardar($_POST['tarea']);

$json = json_encode($listado);
echo $json;