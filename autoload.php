<?php
 // Autoloader function
spl_autoload_register(function($class) {

   
    // Convertir el nombre de la clase en una ruta de archivo
    $archivo = str_replace('\\', '/', $class) . '.php';
    $file = __DIR__ . '/' . $archivo;
    
    // Verificar si el archivo existe
    if (is_file($file)) {
        require_once $file;
    }
});