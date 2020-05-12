<?=file_get_contents("components/head.html");?>
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
            <div class="content confirmation">
                <h1>Thank you for your order <?php echo $name;?></h1>
                <div style="display: flex;">
                    <div class="detail">
                        <h2>Order Information</h2>
                        <p>Order ID: <?php echo $orderId;?></p>
                        <p>Email: <?php echo $email;?></p>
                        <p>Phone Number : <?php echo $phone;?></p>

                        <h2>Product Information</h2>
                        <p>Product: <?php echo $productName;?></p>
                        <p>Quantity: <?php echo $quantity;?></p>
                        <p>Total Price: $<?php echo $row['price'];?></p>

                        <h2>Shipping Information</h2>
                        <p>Method: <?php echo $row['method'];?></p>
                        <p>Address: <?php echo $row['address'];?></p>
                        <p>City: <?php echo $row['city'];?></p>
                        <p>State: <?php echo $row['state'];?></p>
                        <p>Zip Code: <?php echo $row['zip'];?></p>
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