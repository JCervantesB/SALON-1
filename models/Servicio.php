<?php

namespace Model;
class Servicio extends ActiveRecord {
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;
    
    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['precio'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre Es Obligatorio';
        }
        if(!$this->precio) {
            self::$alertas['error'][] = 'El Precio Es Obligatorio';
        }
        if(!is_numeric($this->precio)) {
            self::$alertas['error'][] = 'El Precio No es Valido';
        }
        return self::$alertas;
    }
}
