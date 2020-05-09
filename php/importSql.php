<?php
    require_once "dbconnect.php";

    $query = '';
    $sqlScript = file('../sql/tax_rate.sql');
    foreach ($sqlScript as $line) {

        $startWith = substr(trim($line), 0 ,2);
        $endWith = substr(trim($line), -1 ,1);

        if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
            continue;
        }

        $query = $query . $line;

        if ($endWith == ';') {
            $pdo->exec($query) or die('<div>Problem in executing the SQL query <b>' . $query. '</b></div>');
            $query= '';
        }
    }
    echo '<div>SQL file imported successfully</div>';
?>