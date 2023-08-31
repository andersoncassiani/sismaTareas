<?php
require_once("../../../autoload.php");
require_once("../../controller/tasksController.php");
$class = "../../model/tasks.php";

use app\controller\tasksController;
$tasksController = new tasksController();



if($_POST['estado'] == 0 ){
    $completada = 1;
}else if($_POST['estado'] == 1){
$completada = 0;
}
$actualizar = $tasksController->actulizar($_POST['id'], $completada);

$json = json_encode($actualizar);
echo $json;