<?php

namespace app\controller;
use app\model\tasks;
use Exception;
class tasksController{
    private $tasks;

    public function __construct(){
        $this->tasks = new tasks();
    
    }

    public function guardar($tarea){
       
        if (isset($tarea)) {
        

            if (empty($tarea) ) {
                return 0;
            }else {
                try {
                    
                    $tasks = $this->tasks->guardar($tarea);
                    
                    if ($tasks) {
                        return 1;
                    }else{
                        return 0;
                    }
        
                } catch (Exception $e) {
                    echo "Error al registrar tarea: " . $e->getMessage();
                }
            }
        }
       
    }
    
    public function listarTareas(){

       $listado =  $this->tasks->listarTarea();
       return $listado;
    
    }
    
    public function eliminar($id){
    
       try{
        $eliminar = $this->tasks->eliminar($id);

        if ($eliminar) {
            return 1;
        }else{
            return 0;
        }
 
       }catch(Exception $e){
        echo "Error al eliminar tarea: " . $e->getMessage();
        return 0;
       }
    }

public function actulizar($id, $completada){
try{
$actulizar = $this->tasks->actulizar($id, $completada);

if($actulizar){
    return 1;
}else{
    return 0;
}
}
catch(Exception $e){
    echo "Error al completar tarea: " . $e->getMessage();
    return 0;
   }
    }

}