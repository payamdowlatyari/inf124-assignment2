<?php
    require_once "dbconnect.php";

    // set values to insert
    if(isset($_POST['submit'])){
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

        $errorEmpty = false;
        $errorEmail = false;

        if(empty($firstname) || empty($lastname) || empty($email)){
            echo "<span>Fill in all fields!</span>";
            $errorEmpty = true;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<span>Invalid email!</span>"; 
        }
    }

    

    if (isset($_POST['sameadr']))
        $sameadr = 1;
    else
        $sameadr = 0;

    if($errorEmpty == false && $errorEmail == false){    
        $randomOrderID = rand();
        $sql = "INSERT INTO orders (
                    id, firstname, lastname, email, phone, address,
                    city, state, zip, method, productid, quantity,
                    cardname, cardnumber, expmonth, expyear, cvv)
                VALUES ('$randomOrderID', '$firstname', '$lastname', '$email', '$phone', '$address',
                        '$city', '$state', '$zip', '$method', '$productid', '$quantity',
                        '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";

        $pdo->exec($sql);
        // $newLocation = "orderConfirmation.php?orderid=".$randomOrderID;
        // header("Location:".$newLocation);
        // url must go back to product page
        // alternatively, show order confirmation, then go back to home page
    }
?>
<script>
    var empty = "<?php echo $errorEmpty;?>";
    var email = "<?php echo $errorEmail;?>";
    if(empty == false && email== false){
        window.location.href = "./orderConfirmation.php?orderid=" + <?php echo $randomOrderID;?>
    }
</script>
