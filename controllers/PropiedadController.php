<?php

namespace Controllers;

use Model\Blog;
use Model\Desarrollador;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Categoria;
use Model\Estado;
use Model\Pagina;
use Model\Tecnologia;

class PropiedadController
{
    public static function index(Router $router)
    {
        $paginas = Pagina::all();

        $categorias = Categoria::all();
        $estados = Estado::all();
        $tecnologias = Tecnologia::all();
        $entradas = Blog::all();


        // Crear un mapa de categorías
        $mapaCategorias = [];
        foreach ($categorias as $categoria) {
            $mapaCategorias[$categoria->id] = $categoria->nombre;
        }

        $router->render('proyectos/admin', [
            'paginas' => $paginas,
            'categorias' => $categorias,
            'estados' => $estados,
            'tecnologias' => $tecnologias,
            'entradas' => $entradas,
            'mapaCategorias' => $mapaCategorias
        ]);
    }

    public static function crear(Router $router)
    {
        $pagina = new PAGINA;
        $categorias = Categoria::all();
        $estados = Estado::all();
        $tecnologias = Tecnologia::all();
        $errores = Pagina::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Arreglo con mensaje de errores
            $errores = Pagina::getErrores();
            //crea una nueva instancia
            $pagina = new PAGINA($_POST['pagina']);
            /** SUBIDA DE ARCHIVOS */

            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //setear la imagen
            //Realiza un resize a la imagen con intervention
            if ($_FILES['pagina']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['pagina']['tmp_name']['imagen'])->fit(469, 1015);
                $pagina->setImagen($nombreImagen);
            }
            $email = $_SESSION['usuario'];
            $desarrollador =  Desarrollador::findtt('email', $email);
            $pagina->desarrolladorId = $desarrollador;

            //validar
            $errores = $pagina->validar();

            //Revisar que el arreglo de errores esté vacío
            if (empty($errores)) {

                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la base de datos
                $pagina->guardar();
            }
        }


        $router->render('proyectos/crear', [
            'pagina' => $pagina,
            'errores' => $errores,
            'categorias' => $categorias,
            'estados' => $estados,
            'tecnologias' => $tecnologias
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $pagina = Pagina::find($id);
        $categorias = Categoria::all();
        $estados = Estado::all();
        $tecnologias = Tecnologia::all();
        $errores = Pagina::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los atributos
            $args = $_POST['pagina'];
            $pagina->sincronizar($args);

            // Validación
            $errores = $pagina->validar();

            /** SUBIDA DE ARCHIVOS */
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //setear la imagen
            //Realiza un resize a la imagen con intervention
            if ($_FILES['pagina']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['pagina']['tmp_name']['imagen'])->fit(469, 1015);
                $pagina->setImagen($nombreImagen);
            }


            //Revisar que el arreglo de errores esté vacío
            if (empty($errores)) {

                //Crear la carpeta para subir imagenes
                if ($_FILES['pagina']['tmp_name']['imagen']) {
                    //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                //Guarda en la base de datos
                $pagina->guardar();
            }
        }


        $router->render('proyectos/actualizar', [
            'pagina' => $pagina,
            'errores' => $errores,
            'categorias' => $categorias,
            'estados' => $estados,
            'tecnologias' => $tecnologias
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            //Si hay un id
            if ($id) {

                //Crea la variable tipo
                $tipo = $_POST['tipo'];

                //si es un tipo valido
                if (validarTipoContenido($tipo)) {
                    $pagina = Pagina::find($id);
                    $pagina->eliminar();
                }
            }
        }
    }
}
