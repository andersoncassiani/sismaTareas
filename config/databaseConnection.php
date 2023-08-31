<?php
namespace Config;
use PDO;
use PDOException;
use Exception;
include_once 'constants.php';


class databaseConnection
{
    private $pdo;

    public function __construct($host, $dbName, $username, $password)
    {
        try {
            // Crear una nueva instancia de PDO
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
            // Establecer el modo de error de PDO a excepciones
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Realizar operaciones con la base de datos aquí...
        } catch (PDOException $e) {
            echo "Error de conexión a la base de datos: " . $e->getMessage();
        }
    }

    // Métodos y funciones adicionales relacionadas con la base de datos...

    public function getPdo()
    {
        return $this->pdo;
    }
    // Modelo
    //En esta funcion realizamos consultas en la Base de datos
    public function consultaRetorno($sql, $params = []) {
        try {
            // Preparar la consulta
            $stmt = $this->pdo->prepare($sql);
            
            // Ejecutar la consulta con los parámetros
            $stmt->execute($params);
            
            // Obtener los resultados como un array asociativo
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Verificar si se obtuvieron filas en el resultado
            if (count($datos) > 0) {
                // Si hay filas, retornar los datos
                return $datos;
            } else {
                // Si no hay filas, retornar NULL o algún valor que indique que no se encontraron resultados
                return NULL;
            }
        } catch (Exception $e) {
            echo "Lo siento ocurrió un error Retorno";
            return NULL;
        }
    }
    

//Basicamente aqui guardamos datos en la DBy nos retorna el ultimo ID
    public function consultaSimple($sql, $params = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $this->pdo->lastInsertId();
            
        } catch (PDOException $e) {
            echo "Lo siento, ocurrió un error simple: " . $e->getMessage();
            return NULL;
        }
    }


    public function updateSimple($sql, $params = [])
    {
        try {
            $stmt = $this->getPdo()->prepare($sql);
            $stmt->execute($params);

            // Otras operaciones relacionadas con la actualización...

            return true;
        } catch (PDOException $e) {
            echo "Error al actualizar usuario: " . $e->getMessage();
            return NULL;
        }
    }

}

// Crear una instancia de la clase DatabaseConnection
$database = new DatabaseConnection(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
$pdo = $database->getPdo();

?>