<?php
require_once "dbconnect.php";
if (isset($_POST["query"])) {
    $output = '';
    $mysql = $pdo->prepare("SELECT * FROM tax WHERE zipcode=:zipcode");
    $mysql->execute(['zipcode' => $_POST['query']]);
    $stmt = $mysql->fetch();
    if (is_array($stmt)) {
        $output .=  $stmt["rate"];
    } else {
        $output .= '0.000000';
    }
    echo $output;
}
