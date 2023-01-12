<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>About</title>
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
      <article id="main-col">
        <h1 class="page-title">About Us</h1>
        <p>
          Astralis Group is a leading esports organization, currently operating three teams under the Astralis brand, in
          Counter-Strike (CS:GO), League of Legends (LoL) and Dota 2.
        </p>
        <p class="importantinfo">
          In December 2019, Astralis became the first publicly listed team owner in esports, as the company was listed
          on Nasdaq First North Growth Market.
          Through a pioneering approach to performance and by advocating a positive, balanced lifestyle, the Astralis
          Performance Model has proved groundbreaking in the esports industry.
          The strategic performance approach is a base value throughout the organization, as well as the basis for
          developing all teams under a shared performance-, branding- and business- model.
        </p>
      </article>

      <aside id="sidebar">
        <div class="importantinfo">
          <h3>What We Do</h3>
          <p>Astralis Group owns and operates three teams across multiple globally successful game titles,
            while constantly monitoring the market for new possibilities to exploit its expertise within performance
            optimization and brand building of competitive esports team</p>
        </div>
      </aside>
    </div>
  </section>

  <section id="slideshow">
    <div class="container">
      <h1 id="slideTitle">SLIDESHOW</h1>
      <div class="slides">
        <input type="radio" name="r" id="r1" checked>
        <input type="radio" name="r" id="r2">
        <input type="radio" name="r" id="r3">
        <input type="radio" name="r" id="r4">
        <input type="radio" name="r" id="r5">
        <div class="slide s1">
          <img src="./img/1.jpg">
        </div>
        <div class="slide">
          <img src="./img/2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="./img/3.jpg" alt="">
        </div>
        <div class="slide">
          <img src="./img/4.jpg" alt="">
        </div>
        <div class="slide">
          <img src="./img/5.jpg" alt="">
        </div>
      </div>

      <div class="navigation">
        <label for="r1" class="bar"></label>
        <label for="r2" class="bar"></label>
        <label for="r3" class="bar"></label>
        <label for="r4" class="bar"></label>
        <label for="r5" class="bar"></label>
      </div>
    </div>

  </section>
  
  <?php include('footer.php'); ?>  

</body>

</html>