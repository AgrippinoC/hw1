<?php
    
    include 'autentico.php';
    if (autenticazione()) {
        header('Location: hw1-main.php');
        exit;
    }

    if (!empty($_POST["username"]) && !empty($_POST["password"])){
        $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']) or die(mysqli_error($connect));
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $res = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'") or die(mysqli_error($connect));
        if(mysqli_num_rows($res) > 0) {
		$entry = mysqli_fetch_assoc($res);
            if(password_verify($_POST['password'], $entry['password'])) {
                $_SESSION["_ugora_username"] = $entry['username'];
                $_SESSION["_ugora_user_id"] = $entry['id'];
                header("Location: hw1-main.php");
                mysqli_free_result($res);
                mysqli_close($connect);
                exit;
            }
        } else {
        $error = "ERRORE: Username e/o password errati.";
	}
    } else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "ERRORE: Inserisci username e password.";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='hw1-log.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='hw1-login.js' defer></script>
	<title>Accesso</title>
    </head>
    <body>
	 <p id="logo">
      <img src="https://sicibia.it/wp-content/uploads/2019/01/mandarini-bio.jpg"/></br>
      <em> Azienda Agricola Gagliano</em>
    	</p>
	<nav>
	PAGINA D'ACCESSO
    </nav>
	<?php
            if (isset($error)) {
                    echo "<div class='allarme'><span>$error</span></div>";
                }
        ?>
	<main>
	<section class="campi">
	    <h1>Accedi al sito</h1>
            <form name='login' method='post'>
                <p class="username">
                    <label>Username <input type='text' name='username'></label>
                    <div class='allarme'><span></span></div>
		</p>
                <p class="password">
                    <label>Password <input type='password' name='password'></label>
                </p>
                <p class="submit">
                    <input type='submit' value="ACCEDI">
                </p>
            </form>
	<a href='hw1-registra.php'>REGISTRATI</a>
	</section>
	</main>
    </body>
</head>

</html>