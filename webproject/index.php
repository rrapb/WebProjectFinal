<?php 
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Astralis | Welcome</title>
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="icon" href="./img/logo.png" type="image/png">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=ZCOOL+KuaiLe&display=swap');
  </style>
</head>


<body>
  
  <?php include('header.php'); ?>

  <section id="showcase">
    <div class="container">
      <h1>GAMERS DON'T DIE, THEY RESPAWN.</h1>
      <p>Astralis is a Danish esports organization. Best known for their Counter-Strike: Global Offensive team,
        they also have teams representing other games, such as Dota 2 and League of Legends.</p>
    </div>
  </section>
      

  <section id="boxes">
    <div class="container">
      <div class="box">
        <img src="./img/csgologo.jpg">
        <h3>CS:GO</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
      </div>
      <div class="box">
        <img src="./img/lol.png">
        <h3>League of Legends</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
      </div>
      <div class="box">
        <img src="./img/dota.png">
        <h3>DOTA 2</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>

</body>



</html>