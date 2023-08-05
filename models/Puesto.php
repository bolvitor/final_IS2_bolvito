<?php

namespace Model;

class puesto extends ActiveRecord{
    public static $tabla = 'puestos';
    public static $columnasDB = ['puesto_descripcion','puesto_sueldo','puesto_situacion'];
    public static $idTabla = 'puesto_id';

    public $puesto_id;
    public $puesto_descripcion;
    public $puesto_sueldo;
    public $puesto_situacion;

    public function __construct($args =[])
    {
        $this->puesto_id = $args['puesto_id'] ?? null;
        $this->puesto_descripcion = $args['puesto_descripcion'] ?? '';
        $this->puesto_sueldo = $args['puesto_sueldo'] ?? '';
        $this->puesto_situacion = $args['puesto_situacion'] ?? '1';
    }

}