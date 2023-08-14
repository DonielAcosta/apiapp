<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\SinvModel;

class Sinv extends ResourceController{
    use ResponseTrait;

    protected $modelName = 'App\Models\ScliModel';
    protected $format = 'json';

    public function index(){
        $model = new SinvModel();
        $data = $model->select('descrip, precio1,prvreg,id')   
                    ->where('precio1 IS NOT NULL')
                    ->where('precio1 >', 0)
                    ->findAll(50); // Mover el límite aquí
    if (empty($data)) {
        return $this->respond(["message" => "No se encontraron coincidencias"], 404);
    }
        return $this->respond($data, 200);
    }


    public function show($id = null){
        $model = new \App\Models\SinvModel(); // Instanciar el modelo correctamente

        $scli = $model->find($id);

        if ($scli === null) {
            return $this->respond(["message" => "Cliente no encontrado"], 404);
        }

        return $this->respond($scli, 200);
    }


    // public function show($id = null) {
    //     $model = new \App\Models\ScliModel(); // Instanciar el modelo correctamente
    
    //     $scli = $model->find($id);
    
    //     if ($scli === null) {
    //         $response = [
    //             ["message" => "Cliente no encontrado"]
    //         ];
    //         return $this->respond($response, 404);
    //     }
    
    //     $response = [
    //         $scli
    //     ];
    //     return $this->respond($response, 200);
    // }

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
    // public function search($value = null)
    // {
    //     $model = new \App\Models\SinvModel();

    //     if ($value === null) {
    //         return $this->respond(["message" => "Valor de búsqueda no proporcionado"], 400);
    //     }

    //     $result = [];
        
    //     foreach ($model->allowedFields as $field) {
    //         $queryResult = $model->like($field, $value)->findAll();
    //         if (!empty($queryResult)) {
    //             $result[$field] = $queryResult;
    //         }
    //     }

    //     if (empty($result)) {
    //         return $this->respond(["message" => "No se encontraron coincidencias"], 404);
    //     }

    //     return $this->respond($result, 200);
    // }
    public function search($name = null){
        $model = new \App\Models\SinvModel();
    
        if ($name === null) {
            return $this->respond(["message" => "Nombre de búsqueda no proporcionado"], 400);
        }
    
        $queryResult = $model->select('descrip, precio1,prvreg, id')
            ->like('descrip', '%' . $name .'%' )
            ->where('precio1 IS NOT NULL')
            ->where('precio1 >', 0)
            ->findAll(100); // Mover el límite aquí
    
        if (empty($queryResult)) {
            return $this->respond(["message" => "No se encontraron coincidencias"], 404);
        }
    
        return $this->respond($queryResult, 200);
    }
    
    
    // public function search($value = null)
    // {
    //     $model = new \App\Models\SinvModel();

    //     if ($value === null) {
    //         return $this->respond(["message" => "Valor de búsqueda no proporcionado"], 400);
    //     }

    //     $result = [];
        
    //     foreach ($model->allowedFields as $field) {
    //         $queryResult = $model->like($field, $value)->findAll();
    //         if (!empty($queryResult)) {
    //             $result[$field] = $queryResult;
    //         }
    //     }

    //     if (empty($result)) {
    //         return $this->respond(["message" => "No se encontraron coincidencias"], 404);
    //     }

    //     return $this->respond($result, 200);
    // }

    
    
    
    
    

}





