<?php 
    require_once 'autentico.php';
    if (!$userid = autenticazione()) {
        header("Location: hw1-login.php");
        exit;
    }
?>

<html>
<head>
<title>Video</title>
<link rel="icon" type="image/x-icon" href="IMG/orange-xxl.ico">
<link rel="stylesheet" href="hw1.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap" rel="stylesheet">
<script src="hw1-video.js" defer="true"></script>

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

    <article id="video">
     </br>
     <iframe id="player" width="560" height="315" src="https://www.youtube.com/embed/fQTu3gr13B4?controls=0" title="presentazione" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
     </br>
     <button>Guarda anche altri video</button>
    <div id = "preview">	
    </div>
    </article>

    <footer>Casaccio Agrippino M:1000014638</footer>
</body>

