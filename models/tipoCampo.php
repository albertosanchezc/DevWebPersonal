<?php

namespace Model;

class tipoCampo extends ActiveRecord
{

    protected static $tabla = 'tipoCampo';        
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }

}
