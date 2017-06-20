<?php
namespace App\DbConexion;

use \mysqli;

class MySQL extends mysqli {
    private $data = [
        'username' => 'root',
        'passwd'   => 'toor',
        'host'     => '127.0.0.1',
        'dbname'   => 'biblioteca',
        'port'     => '3306'
    ];

    public function __get($var) {
        return $this->data[$var];
    }

    public function __construct() {
        parent::__construct($this->host, $this->username, $this->passwd, $this->dbname, $this->port);
    }
}

// pruebas, esto deberia borrarse
// $cnn = new MySQL;
// echo 'Versión de MySQL utilizada: ' . $cnn->server_info;