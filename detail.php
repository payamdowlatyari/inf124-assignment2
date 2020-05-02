<?=file_get_contents("components/head.html");?>
<body>
    <div class="container">
        <?=file_get_contents("components/header.html");?>
        <div class="main">
            <div class="content">
                <h1>Basketball</h1>
                <table width="100%" cellspacing="20">
                    <tbody>
                        <tr>
                            <td width="30%" style="text-align: center;">
                                <img src="../assets/baseketball.jpg" class="thumbnail" width="250" alt="basketball" />
                            </td>
                            <td style="display: inline-block;">
                                <h4>Name:</h4>
                                <p>Basketball</p>
                                <h4>Category:</h4>
                                <p>Sports Balls</p>
                                <h4>Price:</h4>
                                <p id="unitPrice">$23.99</p>
                                <select id="quantityOptions" onchange="updatePrice()">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <hr />
                                <h4>Total Price:</h4>
                                <span class="output">$23.99</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h1>Details</h1>
                <div class="detail">
                    <p>NBA and NCAA-approved Basketball. <br /> <br />
                        Become like one of the pros with this NBA-approved Basketball! Improved durable exterior for extend play.
                        Great for indoor or outdoor games.
                    </p><br />
                    <ul>
                        <li>For indoor/outdoor play</li>
                        <li>Ideal size for adults</li>
                        <li>Composite cover for various surfaces</li>
                        <li>Replica NBA Basketball</li>
                    </ul>
                </div>
            </div>
          <div class="content">
            <h1>Order Form</h1>
              <div class="orderform">
                <form name="contactform" id="contactform" method="post" onsubmit="getEventValues();" action="../php/insert.php">
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
                          <input type="text" id="state" name="state" placeholder="NY" required />
                        </div>
                        <div class="col-50">
                          <label for="zip">Zip</label>
                          <input type="text" id="zip" name="zip" placeholder="10001" required />
                        </div>
                      </div>
                      <label for="method">Shipping method</label>
                      <select id="method" name="method">
                        <option>Overnight</option>
                        <option selected>2-day expedited</option>
                        <option>7-day ground</option>
                      </select>
                    </div>

                    <div class="col-50">
                      <h3>Order Details</h3>
                      <br />
                      <label for="quantity">Product ID</label>
                      <input type="text" id="pid" name="productid" placeholder="123456789" required />
                      <label for="pid">Quantity</label>
                      <input type="text" id="quantity" name="quantity" placeholder="5" required />
                      <h3>Payment Information</h3>
                      <br />
                      <label for="cname">Name on Card</label>
                      <input type="text" id="cname" name="cardname" placeholder="John More Doe" required />
                      <label for="ccnum">Credit card number</label>
                      <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required />
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="expmonth" placeholder="September" required />

                      <div class="row">
                        <div class="col-50">
                          <label for="expyear">Exp Year</label>
                          <input type="text" id="expyear" name="expyear" placeholder="2018" required />
                        </div>
                        <div class="col-50">
                          <label for="cvv">CVV</label>
                          <input type="text" id="cvv" name="cvv" placeholder="352" required />
                        </div>
                          <label>
                            <input type="checkbox"checked="checked" name="sameadr"/>
                            Billing address same as shipping
                          </label >
                          <br /><br />
                      </div>
                    </div>
                  </div>

                  <button type="submit" id="submitText" class="js-submit-order btn" tabindex="0" id="formSubmit">
                    Validate Order
                  </button>
                </form>
              </div>

          </div>
        <?=file_get_contents("components/header.html");?>
    </div>
    <script type="text/javascript" src="../main.js"></script>
</body>
</html>