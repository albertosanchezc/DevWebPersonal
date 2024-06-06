<?php

namespace Model;


class Pagina extends ActiveRecord
{

    protected static $tabla = 'pagina';        
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'enlace' , 'categoriaId', 'fechaCreacion', 'estadoProyectoId', 'repositorio', 'tecnologias', 'imagen', 'desarrolladorId'];

    public $id;
    public $nombre;
    public $descripcion;
    public $enlace;
    public $categoriaId;
    public $fechaCreacion;
    public $estadoProyectoId;
    public $repositorio;
    public $tecnologias;
    public $imagen;
    public $desarrolladorId;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->enlace = $args['enlace'] ?? '';
        $this->categoriaId = $args['categoriaId'] ?? '';
        $this->fechaCreacion = date('Y/m/d');
        $this->estadoProyectoId = $args['estadoProyectoId'] ?? '';
        $this->repositorio = $args['repositorio'] ?? '';
        $this->tecnologias = $args['tecnologias'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->desarrolladorId = $args['desarrolladorId'] ?? '';

    }
    
    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }
        if (!$this->descripcion) {
            self::$errores[] = "La Descripción es obligatoria";
        }
        if (!$this->fechaCreacion) {
            self::$errores[] = "La Fecha de Creación es obligatoria";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen de la página es obligatoria";
        }
        if (!$this->enlace) {
            self::$errores[] = "El Enlace es obligatorio";
        }
        if (!$this->repositorio) {
            self::$errores[] = "El Repositorio es obligatorio";
        }
        if (!$this->categoriaId) {
            self::$errores[] = "La Categoria es obligatoria";
        }
        if (!$this->estadoProyectoId) {
            self::$errores[] = "El Estado es obligatorio";
        }
        if (!$this->tecnologias) {
            self::$errores[] = "Selecciona al menos una tecnología";
        }

        return self::$errores;
    }


}
