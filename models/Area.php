<?php

namespace Model;

class puesto extends ActiveRecord{
    public static $tabla = 'areas';
    public static $columnasDB = ['area_nombre','puesto_situacion'];
    public static $idTabla = 'puesto_id';

    public $puesto_id;
    public $area_nombre;
    public $puesto_situacion;

    public function __construct($args =[])
    {
        $this->puesto_id = $args['puesto_id'] ?? null;
        $this->area_nombre = $args['area_nombre'] ?? '';
        $this->puesto_situacion = $args['puesto_situacion'] ?? '1';
    }

}