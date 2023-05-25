<?php
    require_once 'autentico.php';

    if (autenticazione()) {
        header("Location: hw1-main.php");
        exit;
    }   

    if (!empty($_POST["username"]) && !empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && 
        !empty($_POST["password"]) && !empty($_POST["confirm_password"])) {
        $error = array();
        $connect = mysqli_connect($dataconfig['host'], $dataconfig['user'], $dataconfig['password'], $dataconfig['name']) or die(mysqli_error($connect));

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "ERRORE: Username non valido";
        } else {
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $res = mysqli_query($connect, "SELECT username FROM users WHERE username = '$username'");
            if(mysqli_num_rows($res) > 0) {
                $error[] = "ERRORE: Username già usato";
            }
        }

        if (strlen($_POST["password"]) < 10) {
            $error[] = "ERRORE: Caratteri della password insufficienti, min 10";
        } 

        if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
            $error[] = "ERRORE: Le due password non coincidono";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "ERRORE: Email invalida";
        } else {
            $email = mysqli_real_escape_string($connect, strtolower($_POST['email']));
            $res = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email'");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "ERRORE: Email già usata";
            }
        }

        if (count($error) == 0) {
            $name = mysqli_real_escape_string($connect, $_POST['name']);
            $surname = mysqli_real_escape_string($connect, $_POST['surname']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            $password = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO users(name, surname, username, email, password) VALUES('$name', '$surname', '$username', '$email', '$password')";
            
            if (mysqli_query($connect, $query)) {
                $_SESSION["_ugora_username"] = $_POST["username"];
                $_SESSION["_ugora_user_id"] = mysqli_insert_id($connect);
                mysqli_close($connect);
                header("Location: hw1-main.php");
                exit;
            } else {
                $error[] = "ERRORE: Impossibile connettersi al Database";
            }
        }
        mysqli_close($connect);
    } else if (isset($_POST["username"])) {
        $error = array("Riempi tutti i campi");
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='hw1-log.css'>
        <script src='hw1-registra.js' defer></script>
        <meta name="viewport" content="width=device-width">
        <meta charset="utf-8">
        <title>Iscrizione</title>
    </head>

    <body>
         <p id="logo">
      <img src="https://sicibia.it/wp-content/uploads/2019/01/mandarini-bio.jpg"/></br>
      <em> Azienda Agricola Gagliano</em>
    	</p>
	<nav>
	PAGINA DI REGISTRAZIONE
        </nav>
        <main>
        <section class="campi">
	<h1>Iscriviti gratuitamente</h1>
            <form name='signup' method='post' autocomplete="off">
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <input type='text' name='name'>
                        <div><span>Inserisci il nome</span></div>
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname'>
                        <div><span>Inserisci il cognome</span></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username'>
                    <div><span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email'>
                    <div><span>Email non valida</span></div>
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password'>
                    <div><span>Inserisci almeno 10 caratteri</span></div>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password'>
                    <div><span>Le due password non coincidono</span></div>
                </div>
                
                <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='allarme'><span>".$err."</span></div>";
                    }
                } ?>

                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <a id='l' href="hw1-login.php">Accedi se già registrato</a>
	    </br>
        </section>
        </main>
    </body>
</html>