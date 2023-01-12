<?php

session_start();

	require 'includes/dbconnect.php';
    
	$query = $pdo->query('SELECT * FROM users');
    $users = $query->fetchAll();
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
  <?php if(!empty($message)): ?>
        <p><?php echo $message ?></p>
    <?php endif; ?>


    <section>
        <div class="container">
            <div class="mt-2">
              <button id="addNU"> <a href="add_users.php">Add a new user</a></button> 
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                            <tr>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo ($user['admin'] == 1) ? 'Admin' : 'User'; ?></td>
                                <td><?php if(isset($user['image']) && $user['image'] != ""):?><img src="<?php echo $user['image']; ?>"/><?php endif; ?></td>
                                <td><a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure?')"
 href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
           
                    <?php 
                        if(!empty($message)) {
                            echo "<p>$message</p>";
                        } 
                    ?>
                   
    </section>

    <?php include('footer.php'); ?>

</body>

</html>