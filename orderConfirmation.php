<?=file_get_contents("components/head.html");?>
<body>
    <div class="container">
        <?=file_get_contents("components/header.html");?>
        <div class="main">
            <div class="content" id="mainContent" style="padding-bottom: 10px;">
                <h1>Your order has been confirmed.</h1>
                <a href="../index.html" style="margin-left: 20px;">If you don't click here in the next five seconds, you will be automatically redirected.</a>
                <br>
            </div>
        <?=file_get_contents("components/footer.html");?>
    </div>
    <script type="text/javascript" src="js/orderConfirm.js"></script>
</body>
</html>