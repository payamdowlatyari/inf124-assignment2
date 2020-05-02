<?php
    require_once "php/dbconnect.php";
?>
<?=file_get_contents("components/head.html");?>
<body>
    <div class="container">
        <?=file_get_contents("components/header.html");?>
        <div class="main">
            <div class="content">
                <h1>New Products</h1>
                <table width="100%" height="100%" cellspacing="20">
                    <tbody>
                        <tr>
                            <?php
                                $stmt = $pdo->query("SELECT * FROM products LIMIT 0, 5");
                                while ($row = $stmt->fetch()) {
                                    echo '<td class="product">
                                            <a href="detail.php?id='.$row['id'].'"><img src="assets/'.$row['thumbnail'].'" alt="'.$row['name'].' picture"></a>
                                            <h4>'.$row['category'].'</h4>
                                            <h2>'.$row['name'].'</h2>
                                            <h3>'.$row['price'].'</h3>
                                            <p>'.$row['summary'].'</p>
                                            <hr />
                                            <a href="detail.php?id='.$row['id'].'" class="addtocart">See Details</a>
                                        </td>';
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="hotdeal">
                <div class="detail">
                    <h1>Back to school deal</h1>
                    <div class="countdown">00 DAYS, 00 HOURS, 00 MINS, 00 SECS</div>
                    <h2>UP TO 50% OFF</h2>
                    <a href="products.php" class="getdeal">Shop Now</a>
                </div>
            </div>
            <div class="content">
                <h1>TOP SELLING</h1>
                <table width="100%" cellspacing="20">
                    <tbody>
                        <tr>
                            <?php
                                $stmt = $pdo->query("SELECT * FROM products LIMIT 5, 5");
                                while ($row = $stmt->fetch()) {
                                    echo '<td class="product">
                                            <a href="detail.php?id='.$row['id'].'"><img src="assets/'.$row['thumbnail'].'" alt="'.$row['name'].' picture"></a>
                                            <h4>'.$row['category'].'</h4>
                                            <h2>'.$row['name'].'</h2>
                                            <h3>'.$row['price'].'</h3>
                                            <p>'.$row['summary'].'</p>
                                            <hr />
                                            <a href="detail.php?id='.$row['id'].'" class="addtocart">See Details</a>
                                        </td>';
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="content">
                <div class="subscribe">
                    <h3>Sign Up for the <b>NEWSDEAL</b></h3>
                    <form action="email.php" method="POST">
                        <input type="text" name="email" placeholder="Enter Your Email" />
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <?=file_get_contents("components/footer.html");?>
    </div>
    <script type="text/javascript" src="js/countdown.js"></script>
</body>
</html>