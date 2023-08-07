<?php
// OrganizacionController.php

namespace Controllers;

use Exception;
use Model\Empleado;
use Model\Area;
use Model\Asignacion;
use Model\Puesto;
use MVC\Router;

class OrganizacionController
{
    public static function index(Router $router)
    {
        $empleadosPorAreas = static::getEmpleadosPorAreas();
        var_dump($empleadosPorAreas);
        $router->render('organizacion/index', [
            'empleadosPorAreas' => $empleadosPorAreas
        ]);
    }

    public static function getEmpleadosPorAreas()
    {
        $sql = "
            SELECT
                e.empleado_id,
                e.empleado_nombre,
                e.empleado_dpi,
                e.empleado_edad,
                e.empleado_sexo,
                p.puesto_descripcion,
                p.puesto_sueldo,
                a.area_nombre
            FROM
                empleados e
                JOIN asignaciones asi ON e.empleado_id = asi.empleado_id
                JOIN puestos p ON asi.puesto_id = p.puesto_id
                JOIN areas a ON asi.area_id = a.area_id
            WHERE
                e.empleado_situacion = 1
                AND asi.asignacion_situacion = 1
                AND p.puesto_situacion = 1
                AND a.area_situacion = 1;
        ";

        try {
            // Ejecutar el query y obtener los resultados
            $empleadosPorAreas = Empleado::fetchArray($sql);

            // Organizar los resultados por áreas
            $empleadosPorAreasOrganizados = [];
            foreach ($empleadosPorAreas as $empleadoPorArea) {
                $areaNombre = $empleadoPorArea['area_nombre'];
                if (!isset($empleadosPorAreasOrganizados[$areaNombre])) {
                    $empleadosPorAreasOrganizados[$areaNombre] = [];
                }
                $empleadosPorAreasOrganizados[$areaNombre][] = $empleadoPorArea;
            }

            return $empleadosPorAreasOrganizados;
        } catch (Exception $e) {
            // Manejar el error si es necesario
            return []; // Si hay un error, retornar un array vacío
        }
    }
}
