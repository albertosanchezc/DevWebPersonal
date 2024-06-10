<?php

namespace MVC;

class Router
{

    public $rutasGet = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGet[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }


    public function comprobarRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        $splitURL = explode('?', $urlActual);

        //Arreglo de rutas protegidas
        $rutas_protegidas = [
            '/admin',
            '/proyectos/crear',
            '/proyectos/actualizar',
            '/proyectos/eliminar',
            '/categorias/crear',
            '/categorias/actualizar',
            '/categorias/eliminar',
            '/estados/crear',
            '/estados/actualizar',
            '/estados/eliminar',
            '/tecnologias/crear',
            '/tecnologias/actualizar',
            '/tecnologias/eliminar'
        ];



        if ($metodo === 'GET') {
            $fn = $this->rutasGet[$splitURL[0]] ?? null;
        } else {
            $fn = $this->rutasPOST[$splitURL[0]] ?? null;
        }

        //Proteger las rutas
        if (in_array($splitURL[0], $rutas_protegidas) && !$auth) {
            header('Location: /');
        }


        if ($fn) {
            //La URL existe y hay una funcion asociada
            call_user_func($fn, $this);
        } else {
            echo "Pagina No Encontrada";
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        //Inicia almacenamiento en memoria
        ob_start();

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); //Limpia el buffer

        include_once __DIR__ . "/views/layout.php";
    }
}
