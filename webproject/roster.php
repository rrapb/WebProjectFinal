<?php

session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Roster</title>
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

  <section id="main">
    <div class="container">
      <h1>Our Roster</h1>
      <div class="rosterphoto">
        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/zon.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>Zonic</h1>
              <p>The Coach</p>
            </div>
          </div>
        </div>


        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/glave.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>GLA1VE</h1>
              <p>In Game Leader (IGL)</p>
            </div>
          </div>
        </div>


        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/dev.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>DEV1CE</h1>
              <p>The Awper</p>
            </div>
          </div>
        </div>


        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/mag.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>Magisk</h1>
              <p>Entry fragger</p>
            </div>
          </div>
        </div>


        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/dup.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>Dupreeh</h1>
              <p>Entry fragger</p>
            </div>
          </div>
        </div>

        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/mag.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>Simplex</h1>
              <p>Entry fragger</p>
            </div>
          </div>
        </div>

        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/xyp.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>Xyp9x</h1>
              <p>Supporter</p>
            </div>
          </div>
        </div>



        <div class="infobox">
          <div class="img-infobox">
            <img src="./img/bub.jpg">
          </div>

          <div class="textt">
            <div class="content">
              <h1>bubzkji</h1>
              <p>Supporter</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('footer.php'); ?>
  
</body>

</html>