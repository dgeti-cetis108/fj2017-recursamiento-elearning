<?php
namespace MVC\Models;

require 'app/DbConexion/MySQL.php';

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
        $cnn = new MySQL(); // abre una conexion con mysql
        $sql = "select * from usuarios"; // se define la consulta a ejecutar
        $rst = $cnn->query($sql); // se ejecuta la consulta previa

        if (!$rst) {
            die('Error al ejecutar la consulta: '.$cnn->error);
        } elseif ($rst->num_rows > 0) {
            $resultado = [];
            while ($r = $rst->fetch_assoc()) {
                $u = new Usuario;
                $u->id = $r['id'];
                $u->nombre = $r['nombre'];
                $u->apellidos = $r['apellidos'];
                $u->email = $r['email'];
                array_push($resultado, $u);
            }
            return $resultado;
        } else {
            return false;
        }
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

    public function Crear($nombre, $apellidos, $email) {
        $cnn = new MySQL();
        $sql = sprintf("insert into usuarios (nombre,apellidos,email) values ('%s', '%s', '%s')",
                        $nombre, $apellidos, $email);
        $rst = $cnn->query($sql);

        if (!$rst) {
            die('Error al ejecutar la consulta');
        } else {
            $this->id = $cnn->insert_id;
            $cnn->close();
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            return true;
        }
    }
}

// pruebas: deberia borrarse este codigo
// $usuario = new Usuario();
// $usuario->Crear('Bidkar', 'Aragon', 'bidkar@cetis108.edu.mx');
// var_dump($usuario);
// unset($usuario);

$usuario = new Usuario();
$resultado = $usuario->Todos();
var_dump($resultado);