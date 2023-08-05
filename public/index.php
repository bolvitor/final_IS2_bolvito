<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\PuestoController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);
$router->get('/puestos', [PuestoController::class,'index'] );
$router->post('/API/puestos/guardar', [PuestoController::class,'guardarAPI'] );
$router->post('/API/puestos/modificar', [PuestoController::class,'modificarAPI'] );
$router->post('/API/puestos/eliminar', [PuestoController::class,'eliminarAPI'] );
$router->get('/API/puestos/buscar', [PuestoController::class,'buscarAPI'] );

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();