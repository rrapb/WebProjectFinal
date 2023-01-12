<?php

session_start();
    
if( isset($_SESSION['user_id']) ){
    header("Location: index.php");
}

require 'includes/dbconnect.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $decPass = $_POST['password'];
    
    if($username == null || $email == null || $decPass == null) {
        $message = "Field Validation failed!";
        return;
    }

    $password = password_hash($decPass, PASSWORD_BCRYPT);
    $admin = 0;
    $message = '';

    $checkIfUserExistSql = 'SELECT * FROM users WHERE email = :email OR name = :username';
    $existQuery = $pdo->prepare($checkIfUserExistSql);
    $existQuery->bindParam('email', $email);
    $existQuery->bindParam('username', $username);
    $existQuery->execute();
    if(count($existQuery->fetchAll()) == 0) {
        $sql = 'INSERT INTO users (name, password, email, admin) VALUES (:name, :password, :email, :admin)';
        $query = $pdo->prepare($sql);
        $query->bindParam('name', $username);
        $query->bindParam('password', $password);
        $query->bindParam('email', $email);
        $query->bindParam('admin', $admin);
        
        if($query->execute()) {
            $message = "Successfully created your account";
        } else {
            $message = "A problem occurred creating your account";
        }
    }else {
        $message = "An account with these details already exists!";
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
     <header>
      <div id="branding">
        <img src="./img/logo.png">
        <h1>ASTRALIS</h1>
      </div>
      <nav>
      <button class="hamburger" id="hamburger">
         <i class="fa fa-bars"></i>
      </button>
        <ul class="nav-ul hide" id="nav-ul">
          <li class="current"><a href="index.php">Home</a></li>
           <li><a href="about.php">About</a></li>
          <li><a href="roster.php">Roster</a></li>
          <li><a href="contact.php">Contact</a></li>
             <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="dashboard.php">Dashboard</a></li>
            <?php endif; ?>
            <?php if(isset($_SESSION['name'])): ?>
              
              <li style= "border-bottom:red 2px solid ; font-size: 17px; "> Welcome, <a href="#"><?php echo $_SESSION['name']; ?></a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
              <li><a href="login.php">Login</a></li>
              <button type="button" class="signupBtn"><a href="sgnup.php">SIGN UP</a></button>
          <?php endif; ?> 
          </div>  
          
        </ul>
        </div>
      </nav> 
      </header>
    </div>


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
                    <form class="register-form" method="POST" name="form" onsubmit="return validated()">
                        <input type="text" placeholder="username" name="username" />
                        <div id="username_error">Please fill up your Username</div>
                        <input type="text" placeholder="password" name="password"/>
                        <div id="pass_error">Please fill up your Password</div>
                        <input type="text" placeholder="Email" name="email"/>
                        <div id="email_error">Please fill up your Email</div>
                        <button type="submit" name="submit">Create</button>
                        <p class="message">Already Registered ? <a href="login.php"> Login</a></p>
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

        var username = document.forms['form']['username'];
        var email = document.forms['form']['email'];
        var password = document.forms['form']['password'];

        var username_error = document.getElementById('username_error');
        var pass_error = document.getElementById('pass_error');
        var email_errorr = document.getElementById('email_error');

        email.addEventListener('textInput', email_Verify);
        password.addEventListener('textInput', pass_Verify);


        function validated() {
            if (username.value.length < 3) {
                username.style.border = "1px solid red";
                username_error.style.display = "block";
                username.focus();
                return false;
            }
            else {
                username.style.border = "1px solid silver";
                username_error.style.display = "none";
            }

            if (password.value.length < 3) {
                password.style.border = "1px solid red";
                pass_error.style.display = "block";
                password.focus();
                return false;
            }
            else {
                pass_Verify();
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
        }

        function email_Verify() {
            if (email.value.length >= 3 && validate_email(email.value)) {
                email.style.border = "1px solid silver";
                email_error.style.display = "none";
            }
        }

        function pass_Verify() {
            if (password.value.length >=3) {
                password.style.border = "1px solid silver";
                pass_error.style.display = "none";
                
            }
        }

        function validate_email(email) 
        {
            var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(email);
        }
    </script>


    <?php include('footer.php'); ?>

</body>

</html>