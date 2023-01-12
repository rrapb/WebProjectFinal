<?php

session_start();

if( isset($_SESSION['user_id']) ){
    header("Location: index.php");
}

include 'includes/dbconnect.php';


if(isset($_POST['submit'])):
    $username = $_POST['username'];
    $password = $_POST['password'];
    $message = '';

    $query = $pdo->prepare('SELECT id,name,password,email,admin FROM users WHERE name = :username');
    $query->bindParam(':username', $username);
    $query->execute();

    $user = $query->fetch();
    if($user && password_verify($password, $user['password']) ){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        if($user['admin'] == 1) {
            $_SESSION['admin'] = $user['admin'];
        }

        header("Location: index.php");

    } else {
        $message = 'Sorry, those credentials do not match';
    }

endif;

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
        <?php include('header.php');?>
  <?php if(!empty($message)): ?>
        <p><?php echo $message ?></p>
    <?php endif; ?>


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

                    <form action="login.php" class="login-form" method="POST" name="form" onsubmit="return validated()">
                        <input type="text" autocomplete="off" placeholder="username" name="username" />
                        <div id="username_error">Please fill up your Username</div>
                        <input type="Password" autocomplete="off"  placeholder="password" name="password" />
                        <div id="pass_error">Please fill up your Password</div>
                        <button type="submit" name="submit">Login</button>
                        <p class="message">Not Registered ?<a href="sgnup.php"> Register</a></p>
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
        var password = document.forms['form']['password'];

        var username_error = document.getElementById('username_error');
        var pass_error = document.getElementById('pass_error');

        //password.addEventListener('textInput', pass_Verify);


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
                pass_error.style.border = "1px solid silver";
                pass_error.style.display = "none";
            }
        }

    </script>

    <?php include('footer.php');?>

</body>

</html>