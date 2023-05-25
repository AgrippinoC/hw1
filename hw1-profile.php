<?php 
    require_once 'autentico.php';
    if (!$user = autenticazione()) {
        header("Location: hw1-login.php");
        exit;
    }
	
        $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']);
        $user = mysqli_real_escape_string($connect, $user);
        $query = "SELECT * FROM users WHERE username = '$user'";
        $r1s = mysqli_query($connect, $query);
        $info = mysqli_fetch_assoc($r1s);   
   

?>

<html>
    <head>
        <link rel='stylesheet' href='hw1-profile.css'>
        <script src='hw1-profile.js' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profilo</title>
    </head>

    <body>
    	<p id="logo">
      	<img src="https://sicibia.it/wp-content/uploads/2019/01/mandarini-bio.jpg"/></br>
      	<em> Azienda Agricola Gagliano</em>
    	</p>

    	<header>
      	<div id="overlay"></div>
    	<div id="uplay">Profilo di <?php echo $info['name']." ".$info['surname'] ?></div>
  	</header>
    
    	<nav>
	<a href='hw1-main.php'>HOME</a>
        <a href='hw1-recipe.php'>RICETTE</a>
        <a href='hw1-social.php'>CONTATTI</a>
        <a href='hw1-video.php'>VIDEO</a>
        </nav>
        <main>

        <article>
	<div id="foto">
	<img src="IMG/user.png">
	</div>
	<div id="scheda">
	<h3><?php echo $info['username']?></h5>
	<h5>Nome: <?php echo $info['name']?></h5>
	<h5>Cognome: <?php echo $info['surname']?></h5>
	<h5>Email: <?php echo $info['email']?></h5>
	<h5>Arance preferite: 
            <div id="results">
            </div>
	</h5>
	<h5>Scrivi una recensione:</h5>
	<form>
            <input type='text' name='commento' id='comment'>
	    <input type='number' max='5' min='1' name='stella' id='comment'>	
	    <input class="submit" type='submit' value='Invio'>
	</form>
	</br> <a id='l' href='hw1-logout.php'> Logout </a>
    	</article>
	</main>
    </body>
</html>

<?php mysqli_close($connect); ?>
