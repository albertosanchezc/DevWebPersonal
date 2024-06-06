<?php

namespace Model;

class Estado extends ActiveRecord
{

    protected static $tabla = 'estado';        
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';

    }
    
    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "El Estado es obligatorio";
        }

        return self::$errores;
    }

}
