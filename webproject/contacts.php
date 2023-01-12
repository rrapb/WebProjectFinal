<?php

session_start();

	require 'includes/dbconnect.php';
    
	$query = $pdo->query('SELECT * FROM contactform');
    $contacts = $query->fetchAll();
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
            <button class="hamburger" id="hamburger">
                  <i class="fa fa-bars"></i>
                </button>
                <ul class="nav-ul hide" id="nav-ul">
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
            <div class="mt-2">
               <table class="contactTable">
                    <thead>
                         <tr class="headTable">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Message</th>
                            
                        </tr>
                    </thead>
                    
                        <?php foreach($contacts as $contact): ?>
                            <tr>
                                <td><?php echo $contact['firstname']; ?></td>
                                <td><?php echo $contact['lastname']; ?></td>
                                <td><?php echo ($contact['gender'] == 0) ? 'Male' : 'Female'; ?></td>
                                <td><?php echo $contact['email']; ?></td>
                                <td><a href="show_message.php?id=<?php echo $contact['id']; ?>">Show Message</a></td>
                            </tr>
                        <?php endforeach; ?>
                   
                </table>
            </div>
        </div>
    </section>

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