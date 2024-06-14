<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class BlogController{
    public static function crear(Router $router){
        $entrada = new Blog;
        $errores = Blog::getErrores();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Crea una nueva instancia
            $args = $_POST['entrada'];

            $entrada->sincronizar($args);
            
            // Subida de archivos
            // Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con Intervention

            if($_FILES['entrada']['tmp_name']['imagen']){
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                $entrada->setImagen($nombreImagen);
            }
            $errores = $entrada->validar();

            if(empty($errores)){
                // Crear la carpeta para subir imagenes
                if($_FILES['entrada']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES. $nombreImagen);
                }

                $entrada->guardar();
            }
        }

        $router->render('/blog/crear',[
            'errores' => $errores,
            'entrada' => $entrada
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarORedireccionar('/admin');
        $entrada = Blog::find($id);

        $errores = $entrada::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $args = $_POST['entrada'];
            
            $entrada->sincronizar($args);

            $errores = $entrada->validar();

            // Subida de archivos
            // Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Setear la imagen
            // Realiza un Resize a la imagen con Intervention
            if ($_FILES['entrada']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800, 600);
                $entrada->setImagen($nombreImagen);
            }
            
            if(empty($errores)){
                // Crear la carpeta para subir imagenes
                if($_FILES['entrada']['tmp_name']['imagen']){
                    // Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                // Guarda en la base de datos
                $entrada->guardar();
            }

        }

        $router->render('blog/actualizar',[
            'entrada' => $entrada,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $entrada = Blog::find($id);
                    $entrada->eliminar();
                }
            }
        }
    }

}