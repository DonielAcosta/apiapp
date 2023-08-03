<?php 

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
      'us_codigo','us_nombre','us_clave','us_fechae','us_horae','us_fechas','us_horas','supervisor','cajero','almacen','sucursal','vendedor','pers','activo','uuid','propio','id','remoto','especial','emailc','clavec','emailp','tele1','tele2','direc','cedula','tipo','clipro'
    ];
    public function get($id = null) { 
        if($id == null){
          return $this->findAll();  
        }
        return $this->asArray()
                    ->where(['id'=>$id])
                    ->first();
      } 

    // Si la tabla tiene campos de fecha de creación y actualización, descomenta la siguiente línea
    // protected $useTimestamps = true;

//     protected $validationRules = [
//      'cliente' => 'required|alpha_numeric|max_length[5]',
//      'nombre' => 'max_length[65]',
//      'grupo' => 'max_length[4]',
//      // Agrega aquí reglas de validación para los demás campos
//      ];
}




// $scli = $ScliModel->find($id);