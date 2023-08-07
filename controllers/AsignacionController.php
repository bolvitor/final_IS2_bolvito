<?php

namespace Controllers;

use Model\Empleado;
use Model\Area;
use Model\Puesto;
use Exception;
use Model\Asignacion;
use MVC\Router;

class AsignacionController
{
    public static function index(Router $router){
        $empleados = static::buscarEmpleado();
        $areas = static::buscarArea();
        $puestos = static::buscarPuesto();
        $asignaciones = Asignacion::all();
    
        $router->render('asignaciones/index', [
            'empleados' => $empleados,
            'areas' => $areas,
            'puestos' => $puestos,
            'asignaciones' => $asignaciones,
        ]);
    }
    
    // Código del controlador AsignacionController

// ...

public static function buscarEmpleado(){
    $sql = "SELECT * FROM empleados where empleado_situacion = 1";

    try{
        $empleados = Empleado::fetchArray($sql);
        return $empleados; // Retornar directamente los datos
    } catch (Exception $e){
        // Manejar el error si es necesario
        return []; // Si hay un error, retornar un array vacío
    }
}

public static function buscarArea(){
    $sql = "SELECT * FROM areas where area_situacion = 1";

    try{
        $areas = Area::fetchArray($sql);
        return $areas; // Retornar directamente los datos
    } catch (Exception $e){
        // Manejar el error si es necesario
        return []; // Si hay un error, retornar un array vacío
    }
}

public static function buscarPuesto(){
    $sql = "SELECT * FROM puestos where puesto_situacion = 1";

    try{
        $puestos = Puesto::fetchArray($sql);
        return $puestos; // Retornar directamente los datos
    } catch (Exception $e){
        // Manejar el error si es necesario
        return []; // Si hay un error, retornar un array vacío
    }
}

// ...


    public static function guardarAPI()
    {
        // echo json_encode($_POST);
        // exit;
        try {
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->crear();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI()
    {
        try {
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function eliminarAPI()
    {
        try {
            $asignacion_id = $_POST['asignacion_id'];
            $asignacion = Asignacion::find($asignacion_id);
            $asignacion->asignacion_situacion = 0;
            $resultado = $asignacion->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

 
    public static function buscarAPI() {
    $empleado_id = $_GET['empleado_id'];
    $puesto_id = $_GET['puesto_id'];
    $area_id = $_GET['area_id'];
    
    $sql = "SELECT 
        a.asignacion_id, 
        e.empleado_nombre AS asignaciones_empleado_id,
        e.empleado_id,
        p.puesto_descripcion AS asignaciones_puesto_descripcion,
        p.puesto_id,
        ar.area_nombre AS asignaciones_area_nombre,
        ar.area_id
    FROM 
        asignaciones a
    JOIN 
        empleados e ON a.empleado_id = e.empleado_id
    JOIN 
        puestos p ON a.puesto_id = p.puesto_id
    JOIN 
        areas ar ON a.area_id = ar.area_id
    WHERE 
        a.asignacion_situacion = 1";
    
    if ($empleado_id != '') {
        $sql .= " AND e.empleado_id = '$empleado_id'";
    }
    
    if ($puesto_id != '') {
        $sql .= " AND p.puesto_id = '$puesto_id'";
    }
    
    if ($area_id != '') {
        $sql .= " AND ar.area_id = '$area_id'";
    }
    
    try {
        $asignaciones = Asignacion::fetchArray($sql);
        if(empty($asignaciones)){
            echo json_encode([
                'mensaje' => 'El empleado no tiene asignaciones.',
                'codigo' => 0  
            ]);
        }else{
        echo json_encode($asignaciones);
        }
    } catch (Exception $e) {
        echo json_encode([
            'detalle' => $e->getMessage(),
            'mensaje' => 'Ocurrió un error',
            'codigo' => 0
        ]);
    }
}

}    