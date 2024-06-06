<?php

require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\CategoriasController;
use Controllers\EstadosController;
use Controllers\LoginController;
use Controllers\TecnologiasController;



$router = new Router();

$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/proyectos/crear', [PropiedadController::class, 'crear']);
$router->post('/proyectos/crear', [PropiedadController::class, 'crear']);
$router->get('/proyectos/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/proyectos/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/proyectos/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/categorias/crear', [CategoriasController::class, 'crear']);
$router->post('/categorias/crear', [CategoriasController::class, 'crear']);
$router->get('/categorias/actualizar', [CategoriasController::class, 'actualizar']);
$router->post('/categorias/actualizar', [CategoriasController::class, 'actualizar']);
$router->post('/categorias/eliminar', [CategoriasController::class, 'eliminar']);

$router->get('/estados/crear', [EstadosController::class, 'crear']);
$router->post('/estados/crear', [EstadosController::class, 'crear']);
$router->get('/estados/actualizar', [EstadosController::class, 'actualizar']);
$router->post('/estados/actualizar', [EstadosController::class, 'actualizar']);
$router->post('/estados/eliminar', [EstadosController::class, 'eliminar']);

$router->get('/tecnologias/crear', [TecnologiasController::class, 'crear']);
$router->post('/tecnologias/crear', [TecnologiasController::class, 'crear']);
$router->get('/tecnologias/actualizar', [TecnologiasController::class, 'actualizar']);
$router->post('/tecnologias/actualizar', [TecnologiasController::class, 'actualizar']);
$router->post('/tecnologias/eliminar', [TecnologiasController::class, 'eliminar']);

$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/paginas', [PaginasController::class, 'paginas']);
$router->get('/pagina', [PaginasController::class, 'pagina']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);


//Login y autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
