<?=file_get_contents("components/head.html");?>
<link href="../style.css" rel="stylesheet">
<body>
    <?php 
        require_once "./php/dbconnect.php";
        $name = $email = $pid = $quantity = "";
        $orderId = $_GET["orderid"];
        $sql = "SELECT * FROM orders WHERE id=".$orderId;
        foreach($pdo->query($sql) as $row) {
            $name = $row['firstname']." ".$row['lastname'];
            $email = $row['email'];
            $pid = $row['productid'];
            $quantity = $row['quantity'];
            $email = $row['email'];
            $phone = $row['phone'];
            $address = $row['address'];
        }
        $productSql = "SELECT * FROM products WHERE id=".$pid;
        foreach($pdo->query($productSql) as $pRow){
            $productName = $pRow['name'];
            $productCategory = $pRow['category'];
            $productPrice = $pRow['price'];
            $productPic = $pRow['thumbnail'];
        }
    ?>
    <div class="container">
        <?=file_get_contents("components/header.html");?>
        <div class="main">
            <div class="content" style="margin-left: 180px;">
                <h1>Thank you for your order <?php echo $name;?></h1>
                <div style="display: flex;">
                    <div class="orderConfirmation">
                        <h2 style="margin-left: 20px;">Order Information</h2><br/>
                        <p style="margin-left: 40px;">Order ID: <?php echo $orderId;?></p>
                        <p style="margin-left: 40px;">Email : <?php echo $email;?></p>
                        <p style="margin-left: 40px;">Phone Number : <?php echo $phone;?></p>
                        <br/>
                        <h2 style="margin-left: 20px;">Product Information</h2><br/>
                        <p style="margin-left: 40px;">Product: <?php echo $productName;?></p>
                        <p style="margin-left: 40px;">Quantity: <?php echo $quantity;?></p>
                        <p style="margin-left: 40px;">Price per Product: <?php echo $productPrice;?></p>
                        <br/>
                        <h2 style="margin-left: 20px;">Shipping Information</h2><br/>
                        <p style="margin-left: 40px;">Method: <?php echo $row['method'];?></p>
                        <p style="margin-left: 40px;">Address: <?php echo $row['address'];?></p>
                        <p style="margin-left: 40px;">City: <?php echo $row['city'];?></p>
                        <p style="margin-left: 40px;">State: <?php echo $row['state'];?></p>
                        <p style="margin-left: 40px;">Zip Code: <?php echo $row['zip'];?></p>
                    </div>
                    <div>
                        <img src="assets/<?= $productPic; ?>" class="thumbnail" width="175"
                                alt="<?= $productName; ?>" style="margin-left:100px;margin-top: 100px;"/>
                    </div>
                </div> 
            </div>
            <br/>
        <?=file_get_contents("components/footer.html");?>
    </div>

</body>
</html>