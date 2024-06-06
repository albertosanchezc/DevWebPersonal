<?php

namespace Model;

class PROPIEDAD extends ActiveRecord
{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'baños', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $baños;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->baños = $args['baños'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un título";
        }

        if (!$this->precio||$this->precio>9999999) {
            self::$errores[] = "El precio es obligatorio y debe ser menor a 10000000";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Numero de habitaciones es obligatorio";
        }
        if (!$this->baños) {
            self::$errores[] = "Numero de baños es obligatorio";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Numero de lugares de estacionamiento es obligatorio";
        }
        if (!$this->vendedorId) {
            self::$errores[] = "Vendedor es obligatorio";
        }

        if (!$this->imagen) {
            self::$errores[] = "La imagen de la propiedad es obligatoria";
        }
        return self::$errores;
    }
}
