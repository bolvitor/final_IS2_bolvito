<?php

namespace Controllers;

use Exception;
use Model\Asignacion;
use MVC\Router;

class AsignacionController{
    public static function index(Router $router){
        $asignaciones = Asignacion::all();
        // $asignaciones2 = Puesto::all();
        // var_dump($asignaciones);
        // exit;
        $router->render('asignaciones/index', [
            'asignaciones' => $asignaciones,
            // 'asignaciones2' => $asignaciones2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->crear();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            }else{
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

    public static function modificarAPI(){
        try {
            $asignacion = new Asignacion($_POST);
            $resultado = $asignacion->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            }else{
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

    public static function eliminarAPI(){
        try {
            $asignacion_id = $_POST['asignacion_id'];
            $asignacion = Asignacion::find($asignacion_id);
            $asignacion->asignacion_situacion = 0;
            $resultado = $asignacion->actualizar();

            if($resultado['resultado'] == 1){
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            }else{
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

    public static function buscarAPI(){
        // $asignaciones = Puesto::all();
        $asignacion_id = $_GET['asignacion_id'];
        $empleado_id = $_GET['empleado_id'];

        $sql = "SELECT * FROM asignaciones where asignacion_situacion = 1 ";
        if($asignacion_id != '') {
            $asignacion_id = strtolower($asignacion_id);
            $sql.= "asignacion_id like '%$asignacion_id%' ";
        }
        if($empleado_id != '') {
            $sql.= " and empleado_id = $empleado_id ";
        }
        try {
            
            $asignaciones = Asignacion::fetchArray($sql);
    
            echo json_encode($asignaciones);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}