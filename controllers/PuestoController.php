<?php

namespace Controllers;

use Exception;
use Model\Puesto;
use MVC\Router;

class PuestoController{
    public static function index(Router $router){
        $puestos = Puesto::all();
        // $puestos2 = Puesto::all();
        // var_dump($puestos);
        // exit;
        $router->render('puestos/index', [
            'puestos' => $puestos,
            // 'puestos2' => $puestos2,
        ]);

    }

    public static function guardarAPI(){
        try {
            $puesto = new Puesto($_POST);
            $resultado = $puesto->crear();

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
            $puesto = new Puesto($_POST);
            $resultado = $puesto->actualizar();

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
            $puesto_id = $_POST['puesto_id'];
            $puesto = Puesto::find($puesto_id);
            $puesto->puesto_situacion = 0;
            $resultado = $puesto->actualizar();

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
        // $puestos = Puesto::all();
        $puesto_descripcion = $_GET['puesto_descripcion'];
        $puesto_sueldo = $_GET['puesto_sueldo'];

        $sql = "SELECT * FROM puestos where puesto_situacion = 1 ";
        if($puesto_descripcion != '') {
            $puesto_descripcion = strtolower($puesto_descripcion);
            $sql.= " and LOWER(puesto_descripcion) like '%$puesto_descripcion%' ";
        }
        if($puesto_sueldo != '') {
            $sql.= " and puesto_sueldo = $puesto_sueldo ";
        }
        try {
            
            $puestos = Puesto::fetchArray($sql);
    
            echo json_encode($puestos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }
}