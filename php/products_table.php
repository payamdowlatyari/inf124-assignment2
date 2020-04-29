<?php
    require_once "dbconnect.php";
    
    $table = "CREATE TABLE products_table (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                product_name VARCHAR(50) NOT NULL,
                category VARCHAR(30) NOT NULL,
                price FLOAT(2)
                )";
    $pdo->exec($table);
    echo "Table products_table created successfully<br>";

    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Basketball', 'Sports Balls', '23.99')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Soccer Ball', 'Sports Balls', '49.99')";
    $pdo->exec($sql);
    
    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Tennis Balls', 'Sports Balls', '15.99')";
    $pdo->exec($sql);
    
    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Cricket Balls', 'Sports Balls', '39.99')";
    $pdo->exec($sql);
    
    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Golf Balls', 'Sports Balls', '39.99')";
    $pdo->exec($sql);
    
    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Basketball Hoop', 'Sports Equipment', '108.99')";
    $pdo->exec($sql);
    
    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Soccer Cleats', 'Sportswear', '49.99')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Tennis Racket', 'Sports Accessories', '29.99')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Cricket Bat', 'Sports Accessories', '29.99')";
    $pdo->exec($sql);

    $sql = "INSERT INTO products_table (product_name, category, price)
            VALUES ('Golf Club', 'Sports Accessories', '69.99')";
    $pdo->exec($sql);

    echo "Records inserted successfully";
?>