<?=file_get_contents("components/head.html");?>
<body>
    <div class="container">
        <?=file_get_contents("components/header.html");?>
        <div class="main">
            <div class="content">
                <h1>Contact Us</h1>
                <div class="container">

                        <form name="contactform" method="post" action="mailto:info@sportstore.com" enctype="text/plain">
                        <label for="fname">First Name</label>
                      <input type="text" id="fname" name="firstname" placeholder="Your name..." required>

                      <label for="lname">Last Name</label>
                      <input type="text" id="lname" name="lastname" placeholder="Your last name..." required>

                      <label for="email">E-mail</label>
                      <input type="text" id="email" name="E-mail" placeholder="Your E-mail address..." required>


                      <label for="subject">Subject</label>
                      <textarea id="subject" name="subject" placeholder="Write something..." style="height:200px"></textarea>

                      <input type="submit" value="Submit">

                    </form><br><br>
                  </div>
            </div>
        </div>
        <?=file_get_contents("components/footer.html");?>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>