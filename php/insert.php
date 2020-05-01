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
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];

    if (isset($_POST['sameadr']))
        $sameadr = 1;
    else
        $sameadr = 0;

    $sql = "INSERT INTO orders (
                firstname, lastname, email, phone, address, 
                city, state, zip, method, productid, quantity, 
                cardname, cardnumber, expmonth, expyear, cvv)
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', 
                    '$city', '$state', '$zip', '$method', '$productid', '$quantity', 
                    '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";

    $pdo->exec($sql);
    header("refresh:0.5; url=../product/basketball.html");
    // url must go back to product page
    // alternatively, show order confirmation, then go back to home page
?>