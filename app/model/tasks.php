<?php

namespace app\model;
use Config\databaseConnection;
use PDOException;
use Exception;


class Tasks extends databaseConnection{
private $tarea;
private $completada;
private $con;

public function __construct() {
  parent::__construct(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
  $this->con = $this->getPdo();
  $this->tarea = "";
  $this->completada = 0;
    
}

public function guardar($tarea){

  try {

  $sql = "INSERT INTO tasks (tarea, completada) VALUES (:tarea, :completada)";
  $parametro = [':tarea' => $tarea, ':completada'=> $this->completada];
  $registrar = $this->consultaSimple($sql, $parametro);
  
  
  return $registrar;
  } catch (PDOException $e) {
   
      throw new Exception("Error al registrar el usuario: ".$e->getMessage());
  }
}


public function listarTarea(){

  $sql = "SELECT * FROM tasks";
  $listado = $this->consultaRetorno($sql);
  return 	$listado;
}

public function eliminar($id){

  $sql = "DELETE FROM tasks WHERE id = :id";
  $param = [':id' => $id];
  $eliminado= $this->consultaSimple($sql,$param );
  return $eliminado;

}

public function actulizar($id, $completada){

$sql = "UPDATE tasks SET completada = :completada WHERE id = :id ";

$param = [':id' => $id, ':completada' => $completada];
$actualizar  = $this->consultaRetorno($sql, $param);

return $actualizar;
 }


}