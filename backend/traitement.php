<?php

if(isset($_POST['url'])) {

    $url = $_POST['url'];
    $shortcut = crypt($url, time());
    
    if(!filter_var($url, FILTER_VALIDATE_URL)) {

        header("Location: ./?error=true&&message=erreur: url non valide");
        exit();
    } else {

        header("Location: ./?error=false");
        exit();
    }
} 