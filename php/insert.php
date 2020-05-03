<?php
    require_once "dbconnect.php";

    // set values to insert
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $method = $_POST['method'];
    $productid = $_POST['productid'];
    $quantity = $_POST['quantity'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];

    $num_month = $_POST['expmonth'];
    $expmonth = number_format($num_month);

    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];

    if (isset($_POST['sameadr']))
        $sameadr = 1;
    else
        $sameadr = 0;

    // $price

    $sql = "INSERT INTO orders (
                firstname, lastname, email, phone, address,
                city, state, zip, method, productid, quantity,
                cardname, cardnumber, expmonth, expyear, cvv)
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$address',
                    '$city', '$state', '$zip', '$method', '$productid', '$quantity',
                    '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";

    $pdo->exec($sql);
    header("refresh:0.5; url=./orderConfirmation.php");
?>