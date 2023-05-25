<?php 
    require_once 'autentico.php';
    if (!$userid = autenticazione()) {
        header("Location: hw1-login.php");
        exit;
    }
?>

<html>
<head>
<title>Ricette</title>
<link rel="icon" type="image/x-icon" href="IMG/orange-xxl.ico">
<link rel="stylesheet" href="hw1.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&display=swap" rel="stylesheet">
<script src="hw1-recipe.js" defer="true"></script>

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

        <h4>Le nostre arance possono essere usate in varie ricette.</br>
        Cercala specificandone la tipologia
        </h4>
	<form name="search_content" id="food">
        <label>Cerca le ricette:</label>
            <input type='text' name='search' id='content'>	
	    <input type='submit' value='cerca'>
        </form>
	<div id='recipe'></div>
        <div id='erore' class='hidden'> 
        <img src="IMG/sob.gif"/></br>
        Non sono state trovate ricette inerenti </br> prova con un altra tipologia</div>

    <footer>Casaccio Agrippino M:1000014638</footer>
</body>

