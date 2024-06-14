<?php 

namespace Model;

class Blog extends ActiveRecord{
    protected static $tabla = 'entradas';
    protected static $columnasDB = ['id', 'titulo', 'creado', 'autor', 'descripcion', 'imagen'];
    
    public $id;
    public $titulo;
    public $creado;
    public $autor;
    public $descripcion;
    public $imagen;



    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->creado = $args['creado'] ?? date('Y/m/d');
        $this->autor = $args['autor'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "El Titulo es obligatorio";
        }
        if(!$this->autor){
            self::$errores[] = "El Autor es obligatorio";
        }
        if(!$this->descripcion){
            self::$errores[] = "La Descripción es obligatoria";
        }
        if(!$this->imagen){
            self::$errores[] =  'La imagen es obligatoria';
        }


        return self::$errores;
    }
}