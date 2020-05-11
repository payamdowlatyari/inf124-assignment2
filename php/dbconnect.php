<?php
    error_reporting( error_reporting() & ~E_NOTICE );

    $dsn = "mysql:host=localhost;dbname=ssdb"; // must create db named ssdb
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>