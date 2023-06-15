<?php

class Connection extends PDO {

    private static $instance;

    private function __construct() {
        $dsn = 'mysql:host=localhost;dbname=doom';
        //$dsn = 'mysql:host=localhost:3307;dbname=doom';
        $user = 'root';
        $password = '';

        parent::__construct($dsn, $user, $password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Connection();
        }

        return self::$instance;
    }
}