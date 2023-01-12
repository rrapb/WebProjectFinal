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