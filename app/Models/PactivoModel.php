<?php

namespace App\Models;

use CodeIgniter\Model;

class PactivoModel extends Model{
    protected $table            = 'pactivo';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id','nombre'];

    public function get($id = null) { 
        if($id == null){
          return $this->findAll();  
        }
        return $this->asArray()
                    ->where(['id'=>$id])
                    ->first();
      } 
}
