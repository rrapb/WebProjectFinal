<?php

session_start();

require 'includes/dbconnect.php';

if(!isset($_SESSION['user_id']) || !isset($_SESSION['admin']) ){
header("Location: index.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = 'SELECT * FROM contactform WHERE id = :id';
$query = $pdo->prepare($sql);
$query->bindParam('id', $id);
$query->execute();

$contact = $query->fetch();
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
                    <?php if(isset($_SESSION['admin'])): ?>
                    <li><a href="users.php">Users</a></li>
                    <li class="current"><a href="contacts.php">Contacts List</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

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
                    <form class="contact-form" name="form" method="POST" onsubmit="return validated()">
                      <input type="text" placeholder="First Name" id="firstname" name="firstname" value="<?php echo $contact['firstname']; ?>" readonly><br>
                      <div id="firstname_error">Please fill up your First Name</div>
                      <input type="text" placeholder="Last Name" id="lastname" name="lastname" value="<?php echo $contact['lastname']; ?>" readonly><br>
                      <div id="lastname_error">Please fill up your Last Name</div>
                      <input type="text" placeholder="Email" id="email" name="email" value="<?php echo $contact['email']; ?>" readonly><br>
                      <div id="email_error">Please fill up your Email</div>
                      <div class="radio-bttns">
                        <input type="radio" name="gender" value="M" <?php if($contact['gender'] == '0'){?>checked<?php } ?>>Male
                        <input type="radio" name="gender" value="F" <?php if($contact['gender'] == '1'){?>checked<?php } ?>>Female
                      </div>
                      <input type="textarea" style="height:500px;" placeholder="Message" id="messageText" name="messageText" value="<?php echo $contact['message']; ?>" readonly/>
                      <div id="messageText_error">Please fill up your Message</div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    
    <?php include('footer.php'); ?>

</body>

</html>