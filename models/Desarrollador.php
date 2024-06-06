<?php

namespace Model;

class Desarrollador extends ActiveRecord
{
    protected static $tabla = 'desarrollador';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'password2', 'telefono', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $password2;
    public $password_actual;
    public $password_nuevo;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->password_actual = $args['password_actual'] ?? '';
        $this->password_nuevo = $args['password_nuevo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    // Mensajes de validación para la creación de una cuenta
    public function validarNuevacuenta()
    {
        if (!$this->nombre) {
            self::$errores[] = 'El Nombre es Obligatorio';
        }

        if (!$this->apellido) {
            self::$errores[] = 'El Apellido es Obligatorio';
        }

        if (!$this->email) {
            self::$errores[] = 'El Email es Obligatorio';
        }

        if (!$this->password) {
            self::$errores[] = 'El Password es Obligatorio';
        }

        if (strlen($this->password) < 6) {
            self::$errores[] = 'El Password debe contener al menos 6 caracteres';
        }

        if ($this->password !== $this->password2) {
            self::$errores[] = "Los passwords son diferentes";
        }
        return self::$errores;
    }

    public function validarLogin()
    {
        if (!$this->email) {
            self::$errores[] = 'El Email es Obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'El Password es Obligatorio';
        }

        return self::$errores;
    }

    //Revisa si el usuario ya existe
    public function existeUsuario()
    {
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado->num_rows) {
            self::$errores[] = 'El Usuario ya esta registrado';
        }

        return $resultado;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    
    public function crearToken() {
        $this->token = uniqid();
    }

    public function comprobarPasswordAndVerificado($password){
        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado){
            self::$errores[]= 'Password Incorrecto o tu cuenta no ha sido confirmada';
        }else{
            return true;
        }
    }
}
