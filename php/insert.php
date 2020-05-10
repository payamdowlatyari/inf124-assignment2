<?php
    require_once "dbconnect.php";

    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone'])
        && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip'])
        && isset($_POST['billaddr']) && isset($_POST['billcity']) && isset($_POST['billstate']) && isset($_POST['billzip'])
        && isset($_POST['method']) && isset($_POST['productid']) && isset($_POST['quantity']) && isset($_POST['cardname'])
        && isset($_POST['cardnumber']) && isset($_POST['expmonth']) && isset($_POST['expyear']) && isset($_POST['cvv'])) { 

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
        
        // determine billing address
        if (isset($_POST['sameaddr'])) {
            $billaddr = &$_POST['address'];
            $billcity = &$_POST['city'];
            $billstate = &$_POST['state'];
            $billzip = &$_POST['zip'];
        }
        else {
            $billaddr = $_POST['billaddr'];;
            $billcity = $_POST['billcity'];;
            $billstate = $_POST['billstate'];;
            $billzip = $_POST['billzip'];
        }

        $stmt = $pdo->prepare($sql); 
        $stmt->execute(array( 
            ':orderID' => rand(), ':firstname' => $_POST['firstname'], ':lastname' => $_POST['lastname'], 
            ':email' => $_POST['email'], ':phone' => $_POST['phone'], ':address' => $_POST['address'], 
            ':city' => $_POST['city'], ':state' => $_POST['state'], ':zip' => $_POST['zip'], 
            ':billaddr' => $billaddr, ':billcity' => $billcity, ':billstate' => $billstate, ':billzip' => $billzip, 
            ':method' => $_POST['method'], ':productid' => $_POST['productid'], ':quantity' => $_POST['quantity'], 
            ':cardname' => $_POST['cardname'], ':cardnumber' => $_POST['cardnumber'], 
            ':expmonth' => number_format($_POST['expmonth']), ':expyear' => $_POST['expyear'], ':cvv' => $_POST['cvv']));
    }

    // set values to insert
    /*if(isset($_POST['firstname'])){
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

    if (isset($_POST['sameaddr'])) {
        $billaddr = &$address;
        $billcity = &$city;
        $billstate = &$state;
        $billzip = &$zip;
    }
    else {
        $billaddr = $_POST['billaddr'];;
        $billcity = $_POST['billcity'];;
        $billstate = $_POST['billstate'];;
        $billzip = $_POST['billzip'];
    }*/

    /*if($errorEmpty == false && $errorEmail == false){    
        $randomOrderID = rand();
        $sql = "INSERT INTO orders (
                    id, firstname, lastname, email, phone, 
                    address, city, state, zip, 
                    billaddr, billcity, billstate, billzip, 
                    method, productid, quantity, 
                    cardname, cardnumber, expmonth, expyear, cvv)
                VALUES ('$randomOrderID', '$firstname', '$lastname', '$email', '$phone', 
                        '$address','$city', '$state', '$zip', 
                        '$billaddr', '$billcity', '$billstate', '$billzip',
                        '$method', '$productid', '$quantity',
                        '$cardname', '$cardnumber', '$expmonth', '$expyear', '$cvv')";

        $pdo->exec($sql);
    }*/
?>
<!--<script>
    var empty = "<?php // echo $errorEmpty;?>";
    var email = "<?php // echo $errorEmail;?>";
    if(empty == false && email== false){
        window.location.href = "./orderConfirmation.php?orderid=" + <?php // echo $randomOrderID;?>
    }
</script>-->
