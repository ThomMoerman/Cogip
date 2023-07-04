<?php

namespace App\Core;

use PDO; 

class DatabaseConnection {

    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            $dbHost = 'localhost';
            $dbName = 'cogipdb';
            $dbUser = 'root';
            $dbPass = '';

            self::$instance = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        }

        return self::$instance;
    }

}

?>