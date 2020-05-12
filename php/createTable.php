<?php
require_once "dbconnect.php";

    $tables['orders'] = "CREATE TABLE orders (
        id INT(6) UNSIGNED PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        phone VARCHAR(30) NOT NULL,
        address VARCHAR(50) NOT NULL,
        city VARCHAR(30) NOT NULL,
        state VARCHAR(30) NOT NULL,
        zip INT(6) NOT NULL,
        billaddr VARCHAR(50) NOT NULL,
        billcity VARCHAR(30) NOT NULL,
        billstate VARCHAR(30) NOT NULL,
        billzip INT(6) NOT NULL,
        method VARCHAR(30) NOT NULL,
        productid INT(6) NOT NULL,
        quantity INT(6) NOT NULL,
        cardname VARCHAR(30) NOT NULL,
        cardnumber VARCHAR(20) NOT NULL,
        expmonth INT(2) NOT NULL,
        expyear INT(4) NOT NULL,
        cvv INT(4) NOT NULL, 
        price VARCHAR(10) NOT NULL
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

$tables['states'] = "CREATE TABLE states (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(32) NOT NULL,
        abbr VARCHAR(3) NOT NULL
    )";

$tables['tax'] = "CREATE TABLE tax(
        state VARCHAR(2) NOT NULL,
        zipcode INT(6) NOT NULL PRIMARY KEY,
        region VARCHAR(89) NOT NULL,
        rate NUMERIC(8,6) NOT NULL
 )";

foreach ($tables as $table => $query) {
    $results = $pdo->query("SHOW TABLES LIKE '$table'");
    if ($results->rowCount() == 0) {
        echo "<p style='color: green;'>Table $table created successfully</p>";
        $pdo->exec($query);
    } else {
        echo "<p style='color: red;'>Table $table existed</p>";
    }
}