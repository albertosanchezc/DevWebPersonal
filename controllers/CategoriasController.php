<?php 

namespace Controllers;

use Model\Categoria;
use MVC\Router;

class CategoriasController{
   
    public static function crear(Router $router){

        $errores = Categoria::getErrores();
        $categoria = new Categoria;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $categoria = new Categoria($_POST['categoria']);

            // Validar que no haya campos vacios

            $errores = $categoria->validar();
            // No hay errores 
            if(empty($errores)){
                $categoria->guardar();
            }
        }

        $router->render('categorias/crear',[
            'errores' => $errores,
            'categoria' => $categoria
        ]);
    }

    public static function actualizar(Router $router){
        // Arreglo con mensaje de errores
        $errores = Categoria::getErrores();
        $id = validarORedireccionar('/admin');

        // Obtener datos de la categoría a actualizar
        $categoria = Categoria::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['categoria'];

            $categoria->sincronizar($args);
            
            $errores = $categoria->validar();

            if(empty($errores)){
                $categoria->guardar();
            }

        }
        
        $router->render('categorias/actualizar',[
            'errores' => $errores,
            'categoria' => $categoria
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
                    $categoria = Categoria::find($id);
                    $categoria->eliminar();
                }
            }
        }
    }


}