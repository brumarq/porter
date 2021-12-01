<?php

class Repository
{

    public $conn;

    function __construct()
    {

        require __DIR__ . '/../../config.php';
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $dbusername, $dbpassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
