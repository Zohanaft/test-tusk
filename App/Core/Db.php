<?php

namespace App\Core;
 
use PDO;
use PDO\Exceptions;
 
class Db {
    private static $instance;
 
    private static $HOST = '192.168.0.59';
    private static $NAME = 'db_feedback';
    private static $USER = 'admin';
    private static $PASS = '1';
    private static $CHAR = 'utf8';
    private static $PORT = '5432';
    
    private function __construct () {
        $dsn = "pgsql" .  
            ":port="  . self::$PORT .
            ":host=" . self::$HOST .
            ";dbname=" . self::$NAME .
            ";charset=" . self::$CHAR;
             
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => TRUE,
        );
         
        $this->instance = new PDO( $dsn,self::$USER, self::$PASS, $opt );
    }
 
    private function __clone() {}
    private function __wakeup() {}
     
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
 
    public function query($sql, $params=[]) {
        $stmt = $this->instance->prepare($sql);
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
 
    public function column($sql, $params=[]) {
        $result = $this->query($sql, $params);
        return $result->fetchCOlumn();
    }
 
};

?>
