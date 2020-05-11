function getEventValues() {
  try {
    var goodForm = true;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var state = document.getElementById("state").value;
    var zip = document.getElementById("zip").value;
    var quantity = document.getElementById("quantity").value;
    var productid = document.getElementById("pid").value;
    var ccnum = document.getElementById("ccnum").value;
    var expmonth = document.getElementById("expmonth").value;
    var expyear = document.getElementById("expyear").value;
    var cvv = document.getElementById("cvv").value;



    var phoneNumberRE = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    if (!phone.match(phoneNumberRE)) {
      goodForm = false;
      alert("bad number");
    }

    var emailRE = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!email.match(emailRE)) {
      alert("bad email");
      goodForm = false;
    }

    var allNumberRE = /^[0-9]*$/;
    numberChecks = [zip, productid, ccnum, expyear, cvv, quantity, expmonth];
    for (nc in numberChecks) {
      if (!nc.match(allNumberRE)) {
        alert("bad match regarding numbers");
        goodForm = false;
      }
    }

    if (!(cvv.length == 3 || cvv.length == 4)) {
      alert("Invalide length of cvv");
      goodForm = false;
    }

    var intMonth = parseInt(expmonth, 10);
    if (!(intMonth > 0 && intMonth <= 12)) {
      alert("Invalid expiring month");
      goodForm = false;
    }

    states = ["AL", "AK", "AR", "AZ", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY",];
    if (!states.includes(state)) {
      alert("Invalid state input");
    }
    if (goodForm == true) {
      sendEmail();
    }
  } catch (error) {
    alert(error);
  }
}

function sendEmail() {
  document.getElementById("contactform").action = "mailto:info@sportsstore.com";
}

var quantity = 1;
var price = document.getElementById('unitPrice').innerHTML.substring(1);
var total = quantity * price;

function updatePrice() {
  quantityOptions = document.getElementById('quantity').value;
  quantity = quantityOptions;
  total = quantity * price;
}

function showHide() {
  var checkbox = document.getElementById('sameaddr');
  var hidden = document.getElementsByClassName('hidden');

  for (var i = 0; i < hidden.length; i++) {
    if (checkbox.checked)
      hidden[i].style.display = "none";
    else
      hidden[i].style.display = "block";
  }
}

// form validation
$(document).ready(function () {
  $("#orderform").submit(function (event) {
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
    $(".form-message").load("./php/insert.php", {
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

// using jQuery and Ajax for form autocomplete
$(document).ready(function () {

  var taxRate = 0;
  var shipping = 9.50;


  $('#state').keyup(function () {
    var query = $(this).val();
    if (query != '') {
      $.ajax({
        url: "./php/searchState.php",
        method: "POST",
        data: {
          query: query
        },
        success: function (data) {
          $('#stateList').fadeIn();
          $('#stateList').html(data);
        }
      });
    }
  });
  $(document).on('click', 'li', function () {
    $('#state').val($(this).text());
    $('#stateList').fadeOut();
  });


  $('#zip').keyup(function () {

    var query = $(this).val();
    if (query != '') {
      $.ajax({
        url: "./php/searchTaxRate.php",
        method: "POST",
        data: {
          query: query
        },
        success: function (data) {
          $('#tax-rate').fadeIn();
          $('#tax-rate').html(data);
          taxRate = parseFloat(data).toFixed(3);
        }
      });
    }
  });


  $('#method').change(function () {
    var choice = $(this).val();
    if (choice == "Overnight ($11.00)") {
      shipping = 11.00;
    }
    if (choice == "2-day expedited ($9.50)") {
      shipping = 9.50;
    }
    if (choice == "7-day ground ($6.25)") {
      shipping = 6.25;
    }
  });

  $(document).mouseover(function () {
    $('#total-price').html(total.toFixed(2));
    $('#tax-amount').html((total * taxRate).toFixed(2));
    let final = (total + (total * taxRate) + shipping);
    $('#shipping').html(shipping.toFixed(2));
    $('#final-price').html(final.toFixed(2))

  })

  // billing address 
  $('#billing-address').hide();

  $('#same-address').change(function () {
    $('#billing-address').slideToggle();
  })

});