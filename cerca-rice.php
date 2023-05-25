<?php 

require_once 'autentico.php';

if (!autenticazione()){
        echo '<img src="https://media.tenor.com/Rv-IfOOXPSIAAAAC/you-shall-not-pass-lotr.gif"/>';
        exit;
    }

cibo();

function cibo() {

    $cibo = '8c21cf7cd55d47f1a45d203cfd0ece56';
    $query = urlencode($_GET["q"]);
    $url = 'https://api.spoonacular.com/recipes/complexSearch?apiKey='.$cibo.'&query='.$query.'&includeIngredients=orange&number=6';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res=curl_exec($ch);
    curl_close($ch);
    echo $res;
}
?>