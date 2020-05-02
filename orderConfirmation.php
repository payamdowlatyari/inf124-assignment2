<?=file_get_contents("components/head.html");?>
<body>
    <div class="container">
        <?=file_get_contents("components/header.html");?>
        <div class="main">
            <div class="content">
                <h1>Thank you for your order <?php echo $_POST["firstname"]." ".$_POST["lastname"]?></h1>
                <p>Email : <?php echo $_POST["email"];?><br>
                <p>Product ID: <?php echo $_POST["productid"];?></p>
                <p>Quantity: <?php echo $_POST["quantity"];?></p>
            </div>
        <?=file_get_contents("components/header.html");?>
    </div>
    <script type="text/javascript" src="../main.js"></script>
</body>
</html>