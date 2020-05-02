<?php
    require_once "dbconnect.php";
    $tables['orders'] = "CREATE TABLE orders (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        phone INT(6) NOT NULL,
        address VARCHAR(50) NOT NULL,
        city VARCHAR(30) NOT NULL,
        state VARCHAR(30) NOT NULL,
        zip INT(6) NOT NULL,
        method VARCHAR(30) NOT NULL,
        productid INT(6) NOT NULL,
        quantity INT(6) NOT NULL,
        cardname VARCHAR(30) NOT NULL,
        cardnumber INT(20) NOT NULL,
        expmonth INT(2) NOT NULL,
        expyear INT(4) NOT NULL,
        cvv INT(4) NOT NULL
    )";

    $tables['products'] = "CREATE TABLE products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        summary TEXT NOT NULL,
        thumbnail VARCHAR(50) NOT NULL,
        category VARCHAR(30) NOT NULL,
        detail TEXT NOT NULL,
        price FLOAT(2)
    )";

    foreach ($tables as $table => $query) {
        $results = $pdo->query("SHOW TABLES LIKE '$table'");
        if($results->rowCount() == 0){
            echo "<p style='color: green;'>Table $table created successfully</p>";
            $pdo->exec($query);
        } else {
            echo "<p style='color: red;'>Table $table existed</p>";
        }
    }
