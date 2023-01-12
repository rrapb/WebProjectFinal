<?php 

require 'includes/dbconnect.php' ;

session_start();

if(isset($_POST['submit'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $messageText = $_POST['messageText'];
  $gen = 0;
  if($firstname == null || $lastname == null || $gender == null || $email == null || $messageText == null) {
    $message = "Field Validation failed!";
    return;
  }

  if($gender == 'M') {
    $gen = 0;
  }else if($gender == 'F'){
    $gen = 1;
  }
  else{
    $message = "Field Validation failed!";
    return;
  }
  $sql = 'INSERT INTO contactform (firstname, lastname, gender, email, message) VALUES(:firstname, :lastname, :gender, :email, :message)';
  $query = $pdo->prepare($sql);
  $query->bindParam('firstname', $firstname);
  $query->bindParam('lastname', $lastname);
  $query->bindParam('gender', $gen);
  $query->bindParam('email', $email);
  $query->bindParam('message', $messageText);
  if($query->execute()) {
    $message = "Successfully sent";
} else {
    $message = "A problem occurred while contacting us";
}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Log in</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="icon" href="./img/logo.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>

    <?php include('header.php'); ?>

    <section>
        <div class="container">
            <div class="login-block">
                <div class="form">
                    <?php 
                        if(!empty($message)) {
                            echo "<p>$message</p>";
                        } 
                    ?>
                    <img src="./img/logo.png">
                    <form class="contact-form" name="form" method="POST" onsubmit="return validated()">
                      <input type="text" placeholder="First Name" id="firstname" name="firstname" ><br>
                      <div id="firstname_error">Please fill up your First Name</div>
                      <input type="text" placeholder="Last Name" id="lastname" name="lastname" ><br>
                      <div id="lastname_error">Please fill up your Last Name</div>
                      <input type="text" placeholder="Email" id="email" name="email" ><br>
                      <div id="email_error">Please fill up your Email</div>
                      <div style="display:flex">
                        <input type="radio" name="gender" value="M" checked>Male
                        <input type="radio" name="gender" value="F" >Female
                      </div>
                      <input type="textarea" placeholder="Message" id="messageText" name="messageText"/>
                      <div id="messageText_error">Please fill up your Message</div>
                      <input type="submit" name="submit" value="Contact us">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('.message a').click(function () {
            $('form').animate({ height: "toggle", opacity: "toggle" }, "slow")
        });

        //Validation code for inputs

        var firstname = document.forms['form']['firstname'];
        var lastname = document.forms['form']['lastname'];
        var email = document.forms['form']['email'];
        var messageText = document.forms['form']['messageText'];

        var firstname_error = document.getElementById('firstname_error');
        var lastname_error = document.getElementById('lastname_error');
        var email_error = document.getElementById('email_error');
        var messageText_error = document.getElementById('messageText_error');

        function validated() {
            if (firstname.value.length < 3) {
              firstname.style.border = "1px solid red";
              firstname_error.style.display = "block";
                firstname.focus();
                return false;
            }
            else {
              firstname.style.border = "1px solid silver";
              firstname_error.style.display = "none";
            }

            if (lastname.value.length < 3) {
                lastname.style.border = "1px solid red";
                lastname_error.style.display = "block";
                lastname.focus();
                return false;
            }
            else {
                lastname.style.border = "1px solid silver";
                lastname_error.style.display = "none";
            }

            if (email.value.length < 3 || !validate_email(email.value)) {
                email.style.border = "1px solid red";
                email_error.style.display = "block";
                email.focus();
                return false;
            }
            else {
                email_Verify();
            }
            if (messageText.value.length < 3) {
              messageText.style.border = "1px solid red";
              messageText_error.style.display = "block";
              messageText.focus();
                return false;
            }
            else {
              messageText.style.border = "1px solid silver";
              messageText_error.style.display = "none";
            }
        }

        function email_Verify() {
            if (email.value.length >= 3 && validate_email(email.value)) {
                email.style.border = "1px solid silver";
                email_error.style.display = "none";
            }
        }

        function validate_email(email) 
        {
            var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(email);
        }
    </script>


    <?php include('footer.php');?>
</body>

</html>