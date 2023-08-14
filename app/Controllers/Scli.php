<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ScliModel;

class Scli extends ResourceController{
    use ResponseTrait;

    protected $modelName = 'App\Models\ScliModel';
    protected $format = 'json';
        // get all product

    public function index(){
        $model = new ScliModel();
        $data = $model->select('cliente, nombre,rifci,clave')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null){
        $model = new \App\Models\ScliModel(); // Instanciar el modelo correctamente

        $scli = $model->find($id);

        if ($scli === null) {
            return $this->respond(["message" => "Cliente no encontrado"], 404);
        }

        return $this->respond($scli, 200);
    }

    // public function search($field = null, $value = null){
    //     $model = new \App\Models\ScliModel();
    
    //     if ($field === null || $value === null) {
    //         return $this->respond(["message" => "Parámetros de búsqueda incompletos"], 400);
    //     }
    
    //     // Realizar la búsqueda por coincidencia
    //     $result = $model->like($field, $value)->findAll();
    
    //     if (empty($result)) {
    //         return $this->respond(["message" => "No se encontraron coincidencias"], 404);
    //     }
    
    //     return $this->respond($result, 200);
    // }
    public function search($name = null)
    {
        // Crear una instancia del modelo ScliModel
        $model = new \App\Models\ScliModel();
        
        // Verificar si el parámetro $name está vacío
        if (empty($name)) {
            return $this->respond(["message" => "Nombre de búsqueda no proporcionado"], 400);
        }
        
        // Especificar los campos que deseas obtener
        $fields = ['cliente', 'nombre', 'rifci'];
        
        // Realizar la búsqueda en la base de datos y obtener solo los campos especificados
        $queryResult = $model->select($fields)
                             ->like('cliente', $name)
                             ->orLike('nombre', $name)
                             ->orLike('rifci', $name)
                             ->findAll();
        
        // Verificar si se encontraron resultados
        if (empty($queryResult)) {
            return $this->respond(["message" => "No se encontraron coincidencias"], 404);
        }
        
        // Devolver los resultados de la búsqueda
        return $this->respond($queryResult, 200);
    }
    
    
    

}





