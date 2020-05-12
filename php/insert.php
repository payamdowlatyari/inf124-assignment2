<?php
    //Luhn Algorithm created by Hans Peter Luhn to validate credit card numbers
    //Translated to PHP by Ray Hayes on StackOverflow: https://stackoverflow.com/a/174750
    function luhn_check($number) {
        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $number=preg_replace('/\D/', '', $number);
        // Set the string length and parity
        $number_length=strlen($number);
        $parity=$number_length % 2;
        // Loop through each digit and do the maths
        $total=0;
        for ($i=0; $i<$number_length; $i++) {
              $digit=$number[$i];
              // Multiply alternate digits by two
            if ($i % 2 == $parity) {
                $digit*=2;
                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit-=9;
                }
            }
              // Total up the digits
              $total+=$digit;

        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? TRUE : FALSE;
        }
    }
    if(isset($_POST['purchase'])) {
        $isError = false;

        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error["email"] = "<small style='color: red;'>Invalid Email!</small>";
            $isError = true;
        }

        if(isset($_POST['phone'])) {
            $_POST['phone'] = str_replace("-", "", $_POST['phone']);
        }

        if(!is_numeric($_POST['phone']) || (is_numeric($_POST['phone']) && strlen((string)$_POST['phone']) != 10)) {
            $error["phone"] = "<small style='color: red'>Invalid Phone Number!</small>";
            $isError = true;
        }

        if(isset($_POST['zip'])) {
            $_POST['zip'] = substr($_POST['zip'], 0, 5);
        }

        if(!is_numeric($_POST['zip'])) {
            $error["zip"] = "<small style='color: red'>Invalid Zip Code!!</small>";
            $isError = true;
        }

        if(!is_numeric($_POST['quantity'])) {
            $error["quantity"] = "<small style='color: red'>Invalid Quantity!!</small>";
            $isError = true;
        }

        if(!is_numeric($_POST['productid'])) {
            $error["productid"] = "<small style='color: red'>Invalid Product ID!!</small>";
            $isError = true;
        }

        if(!is_numeric($_POST['expmonth']) ) {
            $error["expmonth"] = "<small style='color: red'>Invalid Expiring Month!!</small>";
            $isError = true;
        }

        if(!is_numeric($_POST['expyear']) ) {
            $error["expyear"] = "<small style='color: red'>Invalid Expiring Year</small>";
            $isError = true;
        }

        if(!is_numeric($_POST['cvv']) ) {
            $error["cvv"] = "<small style='color: red'>Invalid CVV Number!!</small>";
            $isError = true;
        }

        if(!is_numeric($_POST['cardnumber']) || !luhn_check($_POST['cardnumber']) ) {
            $error["cardnumber"] = "<small style='color: red'>Invalid Card Number!!</small>";
            $isError = true;
        }

        $sql = "INSERT INTO orders (
            id, firstname, lastname, email, phone,
            address, city, state, zip,
            billaddr, billcity, billstate, billzip,
            method, productid, quantity,
            cardname, cardnumber, expmonth, expyear, cvv)
        VALUES (:orderID, :firstname, :lastname, :email, :phone,
                :address, :city, :state, :zip,
                :billaddr, :billcity, :billstate, :billzip,
                :method, :productid, :quantity,
                :cardname, :cardnumber, :expmonth, :expyear, :cvv)";

        $randomOrderID = rand();
        if(isset($_POST['sameaddr']) && isset($_POST['billaddr'])) {
            $billaddr = &$_POST['address'];
            $billcity = &$_POST['city'];
            $billstate = &$_POST['state'];
            $billzip = &$_POST['zip'];
        } else {
            $billaddr = $_POST['billaddr'];;
            $billcity = $_POST['billcity'];;
            $billstate = $_POST['billstate'];;
            $billzip = $_POST['billzip'];
        }
        if($isError == false) {
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':orderID' => $randomOrderID,
                ':firstname' => $_POST['firstname'],
                ':lastname' => $_POST['lastname'],
                ':email' => $_POST['email'],
                ':phone' => $_POST['phone'],
                ':address' => $_POST['address'],
                ':city' => $_POST['city'],
                ':state' => $_POST['state'],
                ':zip' => $_POST['zip'],
                ':billaddr' => $billaddr,
                ':billcity' => $billcity,
                ':billstate' => $billstate,
                ':billzip' => $billzip,
                ':method' => $_POST['method'],
                ':productid' => $_POST['productid'],
                ':quantity' => $_POST['quantity'],
                ':cardname' => $_POST['cardname'],
                ':cardnumber' => $_POST['cardnumber'],
                ':expmonth' => number_format($_POST['expmonth']),
                ':expyear' => $_POST['expyear'],
                ':cvv' => $_POST['cvv']
            ));
            header("Location: orderConfirmation.php?orderid=".$randomOrderID);
        }
    }
?>