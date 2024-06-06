<?php 

namespace Controllers;

use Model\Tecnologia;
use MVC\Router;

class TecnologiasController{
   
    public static function crear(Router $router){

        $errores = Tecnologia::getErrores();
        $tecnologia = new Tecnologia;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tecnologia = new Tecnologia($_POST['tecnologia']);

            // Validar que no haya campos vacios

            $errores = $tecnologia->validar();

            // No hay errores 
            if(empty($errores)){
                $tecnologia->guardar();
            }
        }

        $router->render('tecnologias/crear',[
            'errores' => $errores,
            'tecnologia' => $tecnologia
        ]);
    }

    public static function actualizar(Router $router){
        // Arreglo con mensaje de errores
        $errores = Tecnologia::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos de la categoría a actualizar
        $tecnologia = Tecnologia::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['tecnologia'];

            $tecnologia->sincronizar($args);
            
            $errores = $tecnologia->validar();

            if(empty($errores)){
                $tecnologia->guardar();
            }
        }
        
        $router->render('tecnologias/actualizar',[
            'errores' => $errores,
            'tecnologia' => $tecnologia
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
                    $tecnologia = Tecnologia::find($id);
                    $tecnologia->eliminar();
                }
            }
        }
    }

}