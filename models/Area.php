<?php

namespace Model;

class area extends ActiveRecord{
    public static $tabla = 'areas';
    public static $columnasDB = ['area_nombre','area_situacion'];
    public static $idTabla = 'area_id';

    public $area_id;
    public $area_nombre;
    public $area_situacion;

    public function __construct($args =[])
    {
        $this->area_id = $args['area_id'] ?? null;
        $this->area_nombre = $args['area_nombre'] ?? '';
        $this->area_situacion = $args['area_situacion'] ?? '1';
    }

}