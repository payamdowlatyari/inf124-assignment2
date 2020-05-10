<?php
require_once "php/dbconnect.php";
$_GET['id'] = empty($_GET['id']) ? 1 : $_GET['id'];
$stmt = $pdo->query("SELECT * FROM products WHERE `id` = '{$_GET['id']}'")->fetch();
?>
<?= file_get_contents("components/head.html"); ?>

<body>
    <div class="container">
        <?= file_get_contents("components/header.html"); ?>
        <div class="main">
            <div class="content">
                <h1><?= $stmt['name']; ?></h1>
                <table width="100%" cellspacing="20">
                    <tbody>
                        <tr>
                            <td width="30%" style="text-align: center;">
                                <img src="assets/<?= $stmt['thumbnail']; ?>" class="thumbnail" width="250"
                                    alt="<?= $stmt['name']; ?>" />
                            </td>
                            <td style="display: inline-block;">
                                <h4>Name:</h4>
                                <p><?= $stmt['name']; ?></p>
                                <h4>Category:</h4>
                                <p><?= $stmt['category']; ?></p>
                                <h4>Price:</h4>
                                <p id="unitPrice">$<?= $stmt['price']; ?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h1>Details</h1>
                <div class="detail"><?= $stmt['detail']; ?></div>
            </div>
            <div class="content">
                <h1>Order Form</h1>
                <div class="orderform">
                    <form name="contactform" id="contactform" method="post" action="php/insert.php">
                        <p class="form-message"></p>
                        <div class="row">
                            <div class="col-50">
                                <h3>Buyer's Information</h3>
                                <br />
                                <label for="fname"> First Name</label>
                                <input type="text" id="fname" name="firstname" placeholder="John" required />
                                <label for="lname"> Last Name</label>
                                <input type="text" id="lname" name="lastname" placeholder="White" required />
                                <label for="email"> Email</label>
                                <input type="text" id="email" name="email" placeholder="john@example.com" required />
                                <label for="phone"> Phone Number</label>
                                <input type="text" id="phone" name="phone" placeholder="123-123-1234" required />
                                <h3>Shipping Address</h3>
                                <br />

                                <label for="adr"> Address</label>
                                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required />
                                <label for="city"> City</label>
                                <input type="text" id="city" name="city" placeholder="New York" required />

                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" placeholder="New York" required />
                                        <div id="stateList"></div>
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zip" placeholder="10001" required />
                                    </div>
                                </div>
                                <label>
                                        <input type="checkbox" checked="checked" id="sameaddr" name="sameaddr" onclick="showHide()" />
                                        Billing address same as shipping
                                </label>
                                <h3 class="hidden">Billing Address</h3>
                                <br class="hidden"/>
                                <label  for="billaddr" class="hidden" style="display: none">Address</label>
                                <input type="text" id="billaddr" name="billaddr" placeholder="542 W. 15th Street" class="hidden"/>
                                <label for="billcity" class="hidden" style="display: none">City</label>
                                <input type="text" id="billcity" name="billcity" placeholder="New York" class="hidden"/>
                                <div class="row">
                                    <div class="col-50">
                                        <label for="billstate" class="hidden" style="display: none">State</label>
                                        <input type="text" id="billstate" name="billstate" placeholder="New York" class="hidden"/>
                                        <div id="stateList"></div>
                                    </div>
                                    <div class="col-50">
                                        <label for="billzip" class="hidden" style="display: none">Zip</label>
                                        <input type="text" id="billzip" name="billzip" placeholder="10001" class="hidden"/>
                                    </div>
                                </div>
                                <br />                   
                            </div>

                            <div class="col-50">
                                <h3>Order Details</h3>
                                <br />
                                <label>Product Name</label>
                                <h4 style="margin-bottom: 20px;"><?= $stmt['name']; ?> ($<?= $stmt['price']; ?>)</h4>
                                <input type="hidden" id="pid" name="productid" value="<?=$_GET['id'];?>" />
                                <label for="method">Shipping method</label>
                                <select id="method" name="method">
                                    <option>Overnight ($11.00)</option>
                                    <option selected>2-day expedited ($9.50)</option>
                                    <option>7-day ground ($6.25)</option>
                                </select>
                                <label for="quantity">Quantity</label>
                                <select id="quantity" onchange="updatePrice2()">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <h3>Payment Information</h3>
                                <br />
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="John More Doe" required />
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"
                                    required />
                                <label for="expmonth">Exp Month</label>
                                <select id="expmonth" name="expmonth" placeholder="September" required>
                                    <option selected>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>

                                <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="2018" required />
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="352" required />
                                    </div>
                                    <br /><br />
                                </div>
                                <div id="price-table">

                                    <div>Total Price:</div>
                                    <div class="price-item">&nbsp; &nbsp;$<span id="total-price"></span></div>

                                    <div>Total Tax: </div>
                                    <div class="price-item">+ $<span id="tax-amount"></span></div>
                                    <div>
                                        <div>Shipping: </div>
                                        <div class="price-item">+ $<span id="shipping"></span></div>
                                    </div>

                                    <div>
                                        <h4>Final Price</h4>

                                        <div class="price-item">= $<span id="final-price"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="order-submit" class="js-submit-order btn" tabindex="0"
                            id="formSubmit">
                            Submit Order
                        </button>
                    </form>
                </div>
            </div>
            <?= file_get_contents("components/footer.html"); ?>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
</body>

</html>