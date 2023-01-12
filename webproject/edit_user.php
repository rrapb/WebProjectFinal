<?php

session_start();

require 'includes/dbconnect.php';

if(!isset($_SESSION['user_id']) || !isset($_SESSION['admin']) ){
header("Location: index.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql1 = 'SELECT * FROM users WHERE id = :id';
$query1 = $pdo->prepare($sql1);
$query1->bindParam('id', $id);
$query1->execute();

$user = $query1->fetch();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $decPass = $_POST['password'];
    $admin = $_POST['user'];
    if($admin == 'admin')
    {
        $admin = 1;
    }
    else {
        $admin = 0;
    }

    if($username == null || $email == null || $decPass == null) {
        $message = "Field Validation failed!";
        return;
    }

    $password = password_hash($decPass, PASSWORD_BCRYPT);
    $message = '';

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imagePathToSave = "uploads/".$username.".".$imageFileType;
    if(isset($_POST["submit"])) {
        if($_FILES["image"]["tmp_name"] != null){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }else {
            $uploadOk = 0;
        }
    }


    if ($uploadOk == 0) {
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePathToSave)) {

        } else {

        }
      }

    $checkIfUserExistSql = 'SELECT * FROM users WHERE (email = :email OR name = :username) AND id != :id';
    $existQuery = $pdo->prepare($checkIfUserExistSql);
    $existQuery->bindParam('email', $email);
    $existQuery->bindParam('username', $username);
    $existQuery->bindParam('id', $id);
    $existQuery->execute();
    
    if(count($existQuery->fetchAll()) == 0) {
        $sql = 'UPDATE users SET name = :username, email = :email, password = :password, admin = :admin, image = :image WHERE id = :id';
        $query = $pdo->prepare($sql);
        $query->bindParam('username', $username);
        $query->bindParam('password', $password);
        $query->bindParam('email', $email);
        $query->bindParam('admin', $admin);
        $query->bindParam('id', $id);
        if($target_file != "uploads/") {
            $query->bindParam('image', $imagePathToSave);
        }
        else{
            $query->bindValue(':image', "");
        }
        
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <div class="container">
            <div id="branding">
                <img src="./img/logo.png">
                <h1>ASTRALIS</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <?php if(isset($_SESSION['name'])): ?>
                        <li style= "border-bottom:red 2px solid ; font-size: 17px; "> Welcome, <a href="#"><?php echo $_SESSION['name']; ?></a></li>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                        <button type="button" class="signupBtn"><a href="sgnup.php">SIGN UP</a></button>
                    <?php endif; ?>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if(isset($_SESSION['admin'])): ?>
                    <li><a href="users.php">Users</a></li>
                    <li><a href="contacts.php">Contacts List</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

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
                    <form enctype="multipart/form-data" class="register-form" method="POST" name="form" onsubmit="return validated()">
                        <input type="text" placeholder="username" name="username" value="<?php echo $user['name']; ?>" />
                        <div id="username_error">Please fill up your Username</div>
                        <input type="text" placeholder="password" name="password"/>
                        <div id="pass_error">Please fill up your Password</div>
                        <input type="text" placeholder="Email" name="email" value="<?php echo $user['email']; ?>"/>
                        <div id="email_error">Please fill up your Email</div>
                        <div class="radio-bttns">
                            <input type="radio" id="admin" name="user" value="admin" <?php if($user['admin'] == '1'){?>checked<?php } ?>>
                            <label for="admin">Admin</label><br>
                            <input type="radio" id="user" name="user" value="user" <?php if($user['admin'] == '0'){?>checked<?php } ?>>
                            <label for="user">User</label><br>
                        </div>
                        <input type="file" name="image" id="image">
                        <button type="submit" name="submit">Update</button>
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


    <footer>
        <div class="icons">
            <a href="https://www.facebook.com/astralisgg/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/astralis/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://twitter.com/AstralisCS" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.youtube.com/channel/UCcAT4ylQFMRuntX0B-ZRwtA" target="_blank"><i
                    class="fa fa-youtube"></i></a>

        </div>
        <p>Astralis Organization, Copyright &copy; 2021</p>
    </footer>
</body>

</html>