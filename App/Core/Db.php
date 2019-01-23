<?php

namespace App\Core;

use PDO;
use PDOException;

class Db {
    private static $instance;

    private static $HOST = '192.168.0.59';
    private static $NAME = 'db_feedback';
    private static $USER = 'admin';
    private static $PORT = '5432';
    private static $PASS = '1';

    private $pdo;

    private function __construct () {
        $dsn = "pgsql" . 
            ":host=" . static::$HOST .
            ";port=" . static::$PORT . 
            ";dbname=" . static::$NAME;
            
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => TRUE,
        );

        $this->pdo = new PDO( $dsn, static::$USER, static::$PASS, $opt );
    }

    public static function getInstance() {
        if (static::$instance === null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    public function query($sql, $params=[]) {
        
        $stmt = static::getInstance()->pdo->prepare($sql);

        if ( !empty($params) ) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':'.$key,$val);
            }
        }

        $stmt->execute();
        
        return $stmt;
    }

    public function row($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

};

?>
