<?php

namespace Model;

class Tecnologia extends ActiveRecord
{

    protected static $tabla = 'tecnologia';        
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
            self::$errores[] = "La tecnologia es obligatoria";
        }

        return self::$errores;
    }

}
