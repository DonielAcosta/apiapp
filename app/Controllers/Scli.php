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
        $data = $model->select('cliente, nombre,clave')->findAll();
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
        $model = new \App\Models\ScliModel();
    
        if ($name === null) {
            return $this->respond(["message" => "Nombre de búsqueda no proporcionado"], 400);
        }
    
        $queryResult = $model->like('nombre', $name)->findAll();
    
        if (empty($queryResult)) {
            return $this->respond(["message" => "No se encontraron coincidencias"], 404);
        }
    
        return $this->respond($queryResult, 200);
    }
    


}





