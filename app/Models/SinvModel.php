<?php 

namespace App\Models;

use CodeIgniter\Model;

class SinvModel extends Model{
    protected $table = 'sinv';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'codigo', 'grupo', 'descrip', 'descrip2', 'unidad', 'ubica', 'tipo', 'clave', 'comision', 'enlace', 'prov1', 'prepro1', 'pfecha1', 'prov2', 'prepro2', 'pfecha2', 'prov3', 'prepro3', 'pfecha3', 'pond', 'ultimo', 'pvp_s', 'pvp_bs', 'pvpprc', 'contbs', 'contprc', 'mayobs', 'mayoprc', 'exmin', 'exord', 'exdes', 'existen', 'fechav', 'fechac', 'iva', 'fracci', 'codbar', 'barras', 'exmax', 'margen1', 'margen2', 'margen3', 'margen4', 'base1', 'base2', 'base3', 'base4', 'precio1', 'precio2', 'precio3', 'precio4', 'serial', 'tdecimal', 'activo', 'dolar', 'redecen', 'formcal', 'fordeci', 'garantia', 'costotal', 'fechac2', 'peso', 'pesoneto', 'pondcal', 'alterno', 'aumento', 'modelo', 'marca', 'clase', 'oferta', 'fdesde', 'fhasta', 'derivado', 'cantderi', 'ppos1', 'ppos2', 'ppos3', 'ppos4', 'linea', 'depto', 'id', 'gasto', 'bonifica', 'bonicant', 'bonimax', 'fraccaja', 'standard', 'modificado', 'descufijo', 'exento', 'alto', 'ancho', 'largo', 'forma', 'mmargen', 'servidor', 'pm', 'pmb', 'mmargenplus', 'escala1', 'pescala1', 'escala2', 'pescala2', 'escala3', 'pescala3', 'url', 'ficha', 'maxven', 'minven', 'premin', 'vnega', 'mpps', 'cpe', 'linfe', 'lindia', 'lincan', 'margenu', 'sada', 'color', 'etiqueta', 'exhimax', 'exhimin', 'exhalma', 'aplicacion', 'area', 'modides', 'preciomar', 'conjunto', 'lote', 'pmarcado', 'talicuota', 'dcomercial', 'rubro', 'subrubro', 'cunidad', 'cmarca', 'cmaterial', 'cforma', 'cpactivo', 'codigofp', 'preciod1', 'preciod2', 'preciod3', 'preciod4', 'ultimod', 'pondd', 'standardd', 'origen', 'cotizacion', 'cotizaciond', 'tasad', 'moneda', 'consigna', 'based1', 'based2', 'based3', 'based4', 'preprod1', 'preprod2', 'preprod3', 'codfp', 'canxdtal', 'zonares', 'tasa', 'desdolar', 'prvreg', 'dproveed'

    ];
    public function get($id = null) { 
        if($id == null){
          return $this->findAll();  
        }
        return $this->asArray()
                    ->where(['id'=>$id])
                    ->first();
      } 


}
