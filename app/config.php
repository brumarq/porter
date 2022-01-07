<?php
    if (getenv('DATABASE_URL') != "") {
        $herokuDb = parse_url(getenv('DATABASE_URL'));

        $type = 'pgsql';
        $servername = $herokuDb['host'];
        $dbusername = $herokuDb['user'];
        $dbpassword = $herokuDb['pass'];
        $databasename = ltrim($herokuDb['path'], '/');
        
    }else {
        
        $type = "mysql";
        $servername = "mysql";
        $dbusername = "developer";
        $dbpassword = "secret123";
        $databasename = "porter";
    }
    
    $conn = new PDO("$type:host=$servername;dbname=$databasename", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);