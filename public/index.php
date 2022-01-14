<?php 

require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\BlogController;
use Controllers\LoginController;

$router = new Router();

//Zona Provada

$router->get('/admin', [PropiedadController::class, 'index'] );
$router->get('/crear', [PropiedadController::class, 'crear']);
$router->post('/crear', [PropiedadController::class, 'crear']);
$router->get('/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/crearv', [VendedorController::class, 'crear']);
$router->post('/crearv', [VendedorController::class, 'crear']);
$router->get('/actualizarv', [VendedorController::class, 'actualizar']);
$router->post('/actualizarv', [VendedorController::class, 'actualizar']);
$router->post('/eliminarv', [VendedorController::class, 'eliminar']);

// Zona Publica 

$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);


$router->get('/blog', [BlogController::class, 'blog']);
$router->get('/crearblog', [BlogController::class, 'crear']);
$router->post('/crearblog', [BlogController::class, 'crear']);


//Login y autenticacion
$router->get('/login',  [LoginController::class, 'login' ] );
$router->post('/login', [LoginController::class, 'login' ] );
$router->get('/logout', [LoginController::class, 'logout' ] );


$router->comprobarRutas();