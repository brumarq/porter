<?php
    $servername = "mysql";
    $username = "developer";
    $password = "secret123";
    $databasename = "porter";

    $conn;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }    