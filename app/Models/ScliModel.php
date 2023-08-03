<?php 

namespace App\Models;

use CodeIgniter\Model;

class ScliModel extends Model{
    protected $table = 'scli';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cliente','nombre','grupo','gr_desc','nit','formap','contacto','tipo','limite','credito','tolera','maxtole','dialimi','socio','dire11','dire12','ciudad1','dire21','dire22','ciudad2','telefono','telefon2','zona','estado','pais','email','emailnoti','vendedor','porvend','cobrador','porcobr','repre','cirepre','ciudad','separa','copias','regimen','comisio','porcomi','rifci','observa','fecha1','fecha2','tiva','cuenta','canticipo','nomfis','riffis','mensaje','modifi','alterno','id','sucursal','mmargen','url','pin','fb','twitter','mercalib','upago','tarifa','tarimonto','aniversario','registrado','longitud','latitud','fpago','sada','visita','diastole','aplicacion','area','municipio','auxiliar','sicm','fechag','login','clave','credivar','cpfac','registro','r_domicilio','r_fecha','r_numero','r_tomo','ultima','u_domicilio','u_fecha','u_numero','u_tomo','repre1','repre1_nlad','repre1_ci','repre1_rif','repre2','repre2_nlad','repre2_ci','repre2_rif','repre1_mail','repre1_tel','repre2_mail','repre2_tel','limdol','limited','cclave','moneda','web','ftp','ftpclave','pcant3m','pmont3m','pmond3m','ppago3m','pcant1m','pmont1m','pmond1m','ppago1m','promfec','pcant3g','pmont3g','ppago3g','pcant1g','pmont1g','pmond1g','ppago1g','prioridad','preferencia','segmento','cod','creado','tiktok','instagram','tipdescu','telegram','pcobroe','pcobror'
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