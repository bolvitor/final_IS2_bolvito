<?php

namespace Model;

class asignacion extends ActiveRecord{
    public static $tabla = 'asignaciones';
    public static $columnasDB = ['empleado_id','puesto_id', 'area_id', 'asignacion_situacion'];
    public static $idTabla = 'asignacion_id';

    public $asignacion_id;
    public $empleado_id;
    public $puesto_id;
    public $area_id;
    public $asignacion_situacion;

    public function __construct($args =[])
    {
        $this->asignacion_id = $args['asignacion_id'] ?? null;
        $this->empleado_id = $args['empleado_id'] ?? '';
        $this->puesto_id = $args['puesto_id'] ?? '';
        $this->area_id = $args['area_id'] ?? '';
        $this->asignacion_situacion = $args['asignacion_situacion'] ?? '1';
    }

}