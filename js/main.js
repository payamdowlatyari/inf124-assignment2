function getEventValues() {
  try {
    var goodForm = true;
    // var fname = document.getElementById("fname").value;
    // var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    // var adr = document.getElementById("adr").value;
    // var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var zip = document.getElementById("zip").value;
    var quantity = document.getElementById("quantity").value;
    var productid = document.getElementById("pid").value;
    // var cname = document.getElementById("cname").value;
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

function updatePrice() {
  let total = document.getElementById('quantityOptions').value;
  let price = document.getElementById('unitPrice').innerHTML.substring(1);
  document.getElementsByClassName('output')[0].innerHTML = "$" + Number.parseFloat(total * price).toFixed(2);
}

// using jQuery and Ajax for form autocomplete
$(document).ready(function () {
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
        }
      });
    }
  });


  $('#method').change(function () {
    var choice = $(this).val();
    if (choice == "Overnight") {
      $('#shipping').html(' (+$12.00)');
    }
    if (choice == "2-day expedited") {
      $('#shipping').html(' (+$9.50)');
    }
    if (choice == "7-day ground") {
      $('#shipping').html(' (+$6.25)');
    }
  })

});