<?php
namespace MVC\Models;

use App\DbConexion\MySQL;

class Usuario {
    private $data = [
        'id'        => '',
        'nombre'    => '',
        'apellidos' => '',
        'email'     => ''
    ];

    public function __get($var) {
        return $this->data[$var];
    }

    public function __set($var, $val) {
        $this->data[$var] = $val;
    }

    public function Todos() {
        // TODO: codigo para obtener todos los usuarios
    }

    public function Buscar($id) {
        // TODO: codigo para buscar un usuario por su ID
    }

    public function Editar($id) {
        // TODO: codigo para editar un usuario
    }

    public function Eliminar($id) {
        // TODO: codigo para eliminar un usuario
    }

    public function Crear() {
        $cnn = new MySQL();
        $sql = sprintf("insert into usuarios (nombre,apellidos,email) values ('%s', '%s', '%s')",
                        $this->nombre, $this->apellidos, $this->email);
        $rst = $cnn->query($sql);

        if (!$rst) {
            die('Error al ejecutar la consulta');
        } else {
            $this->id = $cnn->insert_id;
            $cnn->close();
            return true;
        }
    }
}