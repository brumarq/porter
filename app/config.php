<?php
    $servername = "mysql";
    $dbusername = "developer";
    $dbpassword = "secret123";
    $databasename = "porter";
    
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);