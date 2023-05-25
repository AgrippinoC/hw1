<?php 

require_once 'autentico.php';

if (!autenticazione()){
        echo '<img src="https://media.tenor.com/Rv-IfOOXPSIAAAAC/you-shall-not-pass-lotr.gif"/>';
        exit;
    }
header('Content-Type: application/json');

vimeo();

function vimeo() {

    $secret_vimeo = 'H9rBF8ltTwFiBzCvjT0HTNO1Di7nJBX5jzJPtBjg23O1bao1hR6d5y6VAypplkI/nh1nFtTTjQbk+hCC851HXvKWhPRIiJxL1lqDJI+jQFwj38G3oC4Cea63l3mdjvLP';
    $client_vimeo = '44168c823297effefd1fc5f20a6ce926f12fafa3';
    
    //TOKEN
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.vimeo.com/oauth/authorize/client' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&scope=public'); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.utf8_encode(base64_encode($client_vimeo.':'.$secret_vimeo)))); 
    $token=json_decode(curl_exec($ch), true);
    curl_close($ch);    

    //VIDEO
    $url = 'https://api.vimeo.com/videos?page=1&per_page=5&query=arancia%20sicilia';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
    $res=curl_exec($ch);
    curl_close($ch);
    echo $res;

}
?>