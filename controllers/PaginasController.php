<?php

namespace Controllers;

use Model\Blog;
use MVC\Router;
use Model\Categoria;
use Model\Estado;
use Model\Pagina;
use Model\Tecnologia;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {
        $paginas = Pagina::get(3);
        $entradas = Blog::get(2);
        $inicio = true;

        $categorias = Categoria::all();
        $tecnologias = Tecnologia::all();
        $estados = Estado::all();
        $mapaTecnologias = [];
        foreach ($tecnologias as $tecnologia) {
            $mapaTecnologias[$tecnologia->id] = $tecnologia->nombre;
        }


        // Crear un mapa de categorías
        $mapaCategorias = [];
        foreach ($categorias as $categoria) {
            $mapaCategorias[$categoria->id] = $categoria->nombre;
        }

        $mapaEstados = [];
        foreach ($estados as $estado) {
            $mapaEstados[$estado->id] = $estado->nombre;
        }

        $router->render('paginas/index', [
            'paginas' => $paginas,
            'inicio' => $inicio,
            'entradas' => $entradas,
            'mapaCategorias' => $mapaCategorias,
            'mapaTecnologias' => $mapaTecnologias,
            'mapaEstados' => $mapaEstados
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }

    public static function paginas(Router $router)
    {
        $paginas = Pagina::all();
        $categorias = Categoria::all();
        $estados = Estado::all();
        $tecnologias = Tecnologia::all();


        // Crear un mapa de categorías
        $mapaCategorias = [];
        foreach ($categorias as $categoria) {
            $mapaCategorias[$categoria->id] = $categoria->nombre;
        }

        $mapaEstados = [];
        foreach ($estados as $estado) {
            $mapaEstados[$estado->id] = $estado->nombre;
        }

        $mapaTecnologias = [];
        foreach ($tecnologias as $tecnologia) {
            $mapaTecnologias[$tecnologia->id] = $tecnologia->nombre;
        }

        $router->render('paginas/paginas', [
            'paginas' => $paginas,
            'mapaCategorias' => $mapaCategorias,
            'mapaEstados' => $mapaEstados,
            'mapaTecnologias' => $mapaTecnologias

        ]);
    }

    public static function pagina(Router $router)
    {
        $id = validarORedireccionar('/propiedades');

        $pagina = PAGINA::find($id);
        $categorias = Categoria::all();
        $tecnologias = Tecnologia::all();
        $estados = Estado::all();
        $mapaTecnologias = [];
        foreach ($tecnologias as $tecnologia) {
            $mapaTecnologias[$tecnologia->id] = $tecnologia->nombre;
        }


        // Crear un mapa de categorías
        $mapaCategorias = [];
        foreach ($categorias as $categoria) {
            $mapaCategorias[$categoria->id] = $categoria->nombre;
        }

        $mapaEstados = [];
        foreach ($estados as $estado) {
            $mapaEstados[$estado->id] = $estado->nombre;
        }


        $router->render('paginas/pagina', [
            'pagina' => $pagina,
            'mapaCategorias' => $mapaCategorias,
            'mapaEstados' => $mapaEstados,
            'mapaTecnologias' => $mapaTecnologias
        ]);
    }

    public static function blog(Router $router)
    {
        $entradas = Blog::all();

        $router->render('paginas/blog', [
            'entradas' => $entradas
        ]);
    }

    public static function entrada(Router $router)
    {
        $id = validarORedireccionar('/blog');
        $entrada = Blog::find($id);
        $router->render('paginas/entrada',[
            'entrada' => $entrada
        ]);
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            //Configurar SMTP (Protocolo para el envio de emails)
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = $_ENV['EMAIL_PORT'];

            //Configurar el contenido del mail
            $mail->setFrom($_ENV['EMAIL_FROM']);
            $mail->addAddress($_ENV['EMAIL_TO'], $_ENV['EMAIL_TO_2']);
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            //Habilitar HTML
            $mail->isHTML(true); //Habilita el html
            $mail->CharSet = 'UTF-8'; //Muestra caracteres especiales del español

            //Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre'] . " " . $respuestas['apellido'] .'</p>';

            //Enviar de forma condicional algunos campos del email o teléfono
            if($respuestas['contacto']==='telefono'){
                $contenido .= '<p>Eligió ser contactado por Telefono:</p>';
                $contenido .= '<p>Teléfono: '. $respuestas['telefono'] .'</p>';
                $contenido .= '<p>Fecha Contacto: '. $respuestas['fecha'] .'</p>';
                $contenido .= '<p>Hora: '. $respuestas['hora'] .'</p>';
    
            }else{
                //Es email, se agrega el campo email
                $contenido .= '<p>Eligió ser contactado por Email:</p>';
                $contenido .= '<p>Email: '. $respuestas['email'] .'</p>';

            }
            $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
            $contenido .= '<p>Presupuesto: $'. $respuestas['precio'] .'</p>';

 
            $contenido .= '</html>';
            
            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el email
            if ($mail->send()) {
                $mensaje = "Mensaje Enviado Correctamente";
            } else {
                $mensaje =  "El mensaje no se pudo enviar...";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
