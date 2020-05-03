<?=file_get_contents("components/head.html");?>
<script>
  $(document).ready(function(){
    console.log("ready");
    $("#orderform").submit(function(event){
      console.log("hi");
      event.preventDefault();
      var fname = $("#fname").val();
      var lname = $("#lname").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var adr = $("#adr").val();
      var city = $("#city").val();
      var state = $("#state").val();
      var zip = $("#zip").val();
      var method = $("#method").val();
      var pid = $("#pid").val();
      var quantity = $("#quantity").val();
      var cardname = $("#cname").val();
      var cardnumber = $("#ccnum").val();
      var expmonth = $("#expmonth").val();
      var expyear = $("#expyear").val();
      var cvv = $("#cvv").val();
      var submit = $("#order-submit").val();
      $(".form-message").load("/php/insert.php", {
        firstname: fname,
        lastname: lname,
        email: email,
        phone: phone,
        address: adr,
        city: city,
        state: state,
        zip: zip,
        method: method,
        productid: pid,
        submit: submit,
        quantity: quantity,
        cardname: cardname,
        cardnumber: cardnumber,
        expmonth: expmonth,
        expyear: expyear,
        cvv: cvv
      });
    });
  });
</script>
  <body>
    <div class="container">
      <?=file_get_contents("components/header.html");?>
      <div class="main">
        <div class="content">
          <h1>Order Form</h1>
            <div class="orderform">
              <form id="orderform" method="POST" enctype="text/plain">
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

                <button id="order-submit" type="submit" class="js-submit-order btn" tabindex="0" id="formSubmit">
                  Submit Order
                </button>
              </form>
            </div>
        </div>
      </div>
        <?=file_get_contents("components/footer.html");?>
    </div>
  </body>
</html>
