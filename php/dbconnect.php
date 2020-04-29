<?php
    $dsn = "mysql:host=localhost;dbname=ssdb"; // must create db named ssdb
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected to DB<br>";
    }
    
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>