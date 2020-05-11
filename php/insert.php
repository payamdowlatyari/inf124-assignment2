<?php
    require_once "dbconnect.php";

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
        }
      
        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? TRUE : FALSE;
      
      }

    $error = false;


    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo "<span style='color: red;'>Invalid Email!</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['phone']) || (is_numeric($_POST['phone']) && strlen((string)$_POST['phone']) != 10)) {
        echo "<span style='color: red'>Invalid Phone Number!</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['zip'])) {
        echo "<span style='color: red'>Invalid Zip Code!!</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['quantity'])) {
        echo "<span style='color: red'>Invalid Quantity!!</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['productid'])) {
        echo "<span style='color: red'>Invalid Product ID!!</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['expmonth']) ) {
        echo "<span style='color: red'>Invalid Expiring Month!!</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['expyear']) ) {
        echo "<span style='color: red'>Invalid Expiring Year</span><br/>";
        $error = true;
    }

    if(!is_numeric($_POST['cvv']) ) {
        echo "<span style='color: red'>Invalid CVV Number!!</span><br/>";
        $error = true;
    }
    
    if(!is_numeric($_POST['cardnumber']) || !luhn_check($_POST['cardnumber']) ) {
        echo "<span style='color: red'>Invalid Card Number!!</span><br/>";
        $error = true;
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
    
    // determine billing address
    if (isset($_POST['sameaddr'])) {
        $billaddr = &$_POST['address'];
        $billcity = &$_POST['city'];
        $billstate = &$_POST['state'];
        $billzip = &$_POST['zip'];

        $stmt = $pdo->prepare($sql); 
        $stmt->execute(array( 
            ':orderID' => $randomOrderID, ':firstname' => $_POST['firstname'], ':lastname' => $_POST['lastname'], 
            ':email' => $_POST['email'], ':phone' => $_POST['phone'], ':address' => $_POST['address'], 
            ':city' => $_POST['city'], ':state' => $_POST['state'], ':zip' => $_POST['zip'], 
            ':billaddr' => '', ':billcity' => '', ':billstate' => '', ':billzip' => '', 
            ':method' => $_POST['method'], ':productid' => $_POST['productid'], ':quantity' => $_POST['quantity'], 
            ':cardname' => $_POST['cardname'], ':cardnumber' => $_POST['cardnumber'], 
            ':expmonth' => number_format($_POST['expmonth']), ':expyear' => $_POST['expyear'], ':cvv' => $_POST['cvv']));
    }
    else if (isset($_POST['billaddr'])) {
        $billaddr = $_POST['billaddr'];;
        $billcity = $_POST['billcity'];;
        $billstate = $_POST['billstate'];;
        $billzip = $_POST['billzip'];
    

        $stmt = $pdo->prepare($sql); 
        $stmt->execute(array( 
            ':orderID' => $randomOrderID, ':firstname' => $_POST['firstname'], ':lastname' => $_POST['lastname'], 
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
<script>
    var error = "<?php  echo $error;?>";
    if(error == false){
        window.location.href = "./orderConfirmation.php?orderid=" + "<?php echo $randomOrderID;?>"
    }
</script>
