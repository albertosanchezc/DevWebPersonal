<?php

namespace Controllers;

use Model\Estado;
use Model\Tecnologia;
use MVC\Router;

class EstadosController
{

    public static function crear(Router $router)
    {

        $errores = Estado::getErrores();
        $estado = new Estado;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $estado = new Estado($_POST['estado']);

            // Validar que no haya campos vacios

            $errores = $estado->validar();

            // No hay errores 
            if (empty($errores)) {
                $estado->guardar();
            }
        }

        $router->render('estados/crear', [
            'errores' => $errores,
            'estado' => $estado
        ]);
    }

    public static function actualizar(Router $router){
        // Arreglo con mensaje de errores
        $errores = Estado::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos de la categoría a actualizar
        $estado = Estado::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['estado'];

            $estado->sincronizar($args);
            
            $errores = $estado->validar();

            if(empty($errores)){
                $estado->guardar();
            }

        }
        
        $router->render('estados/actualizar',[
            'errores' => $errores,
            'estado' => $estado
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)){
                    $estado = Estado::find($id);
                    $estado->eliminar();
                }
            }
        }
    }
}
