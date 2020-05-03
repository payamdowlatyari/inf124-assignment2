<?=file_get_contents("../components/head.html");?>
<link href="../style.css" rel="stylesheet">
<body>
    <?php 
        require_once "dbconnect.php";
        $name = $email = $pid = $quantity = "";
        $orderId = $_GET["orderid"];
        $sql = "SELECT * FROM orders WHERE id=".$orderId;
        foreach($pdo->query($sql) as $row) {
            $name = $row['firstname'].$row['lastname'];
            $email = $row['email'];
            $pid = $row['productid'];
            $quantity = $row['quantity'];
        }
    ?>
    <div class="container">
        <?=file_get_contents("../components/header.html");?>
        <div class="main">
            <div class="content">
                <h1>Thank you for your order <?php echo $name;?></h1>
                <p>Email : <?php echo $email;?><br>
                <p>Product ID: <?php echo $pid;?></p>
                <p>Quantity: <?php echo $quantity;?></p>
            </div>
        <?=file_get_contents("../components/footer.html");?>
    </div>
</body>
</html>