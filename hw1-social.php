<?php 
    require_once 'autentico.php';
    if (!$userid = autenticazione()) {
        header("Location: hw1-login.php");
        exit;
    }
?>

<html>
<head>
<title>Social</title>
<link rel="icon" type="image/x-icon" href="IMG/orange-xxl.ico">
<link rel="stylesheet" href="hw1.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap" rel="stylesheet">
<script src="hw1-social.js" defer="true"></script>

<meta name="viewport"
content="width=device-width, initial-scale=1"> 
</head>
  <body>

     <p id="logo">
      <img src="https://sicibia.it/wp-content/uploads/2019/01/mandarini-bio.jpg"/></br>
      <em> Azienda Agricola Gagliano</em>
    </p>

    <header>
      <div id="overlay"></div>
      <div id="uplay">Agrumi di Sicilia</br></div>
    </header>
    
    <nav>
      <a href='hw1-recipe.php'>RICETTE</a>
      <a href='hw1-social.php'>CONTATTI</a>
      <a href='hw1-main.php'>HOME</a>
      <a href='hw1-video.php'>VIDEO</a>
      <a href='hw1-profile.php'>PROFILO</a>
    </nav>

    <article id='cont'>
	<p>L'Azienza Agricola Gagliano è una piccola azienda a conduzione familiare specializzata nella produzione e raccolta delle arance.
	</p>
	<h3>Vieni a trovarci</h3>
	<section id = 'map'>
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d9095.49469022354!2d14.674359142258584!3d37.28574592707837!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sit!2sit!4v1684166537704!5m2!1sit!2sit" width="400" height="300" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</section>        
	<h3>Cercaci su tutti i nostri social</h3>
        <section id = 'social'>
		<img data-src="1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/768px-2021_Facebook_icon.svg.png"/>
		<img data-src="2" src="https://img.freepik.com/free-icon/twitter_318-674515.jpg"/>
		<img data-src="3" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/769px-Instagram-Icon.png"/>
	</section>
	<section id = 'comment'>
	</section>
    </article>

    <footer>Casaccio Agrippino M:1000014638</footer>
</body>

