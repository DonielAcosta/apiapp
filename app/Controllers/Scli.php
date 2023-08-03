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
    public function index()
    {
        $model = new ScliModel();
        $data = $model->findAll();
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
    public function search($value = null)
    {
        $model = new \App\Models\ScliModel();

        if ($value === null) {
            return $this->respond(["message" => "Valor de búsqueda no proporcionado"], 400);
        }

        $result = [];
        
        foreach ($model->allowedFields as $field) {
            $queryResult = $model->like($field, $value)->findAll();
            if (!empty($queryResult)) {
                $result[$field] = $queryResult;
            }
        }

        if (empty($result)) {
            return $this->respond(["message" => "No se encontraron coincidencias"], 404);
        }

        return $this->respond($result, 200);
    }



}





