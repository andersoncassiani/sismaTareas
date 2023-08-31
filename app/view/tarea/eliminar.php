<?php
require_once("../../../autoload.php");
require_once("../../controller/tasksController.php");
$class = "../../model/tasks.php";

use app\controller\tasksController;
$tasksController = new tasksController();

$eliminar = $tasksController->eliminar($_POST['id']);

$json = json_encode($eliminar);
echo $json;