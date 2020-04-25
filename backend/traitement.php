<?php

require 'database.php';

if(isset($_GET['q'])) {

    $shortcut = htmlspecialchars($_GET['q']);

    $datas = $bdd->prepare('SELECT COUNT(*) AS links FROM bitly WHERE shortcut = ?');
    $datas->execute(array($shortcut));

    while($data = $datas->fetch()) {
        
        if($data['links'] != 1) {
         
            header("Location: ./?error=true&&message=erreur: Adresse url non connue");
            exit();
        }
    }

    $datas->closeCursor();

    $datas = $bdd->prepare('SELECT * FROM bitly WHERE shortcut = ?');
    $datas->execute(array($shortcut));

    while($data = $datas->fetch()) {

        header('location: ' . $data['url']);
        exit();
    }
}

if(isset($_POST['url'])) {

    $url = $_POST['url'];
    $shortcut = crypt($url, rand());
    
    if(!filter_var($url, FILTER_VALIDATE_URL)) {

        header("Location: ./?error=true&&message=erreur: url non valide");
        exit();
    } 

    $datas = $bdd->prepare('SELECT COUNT(*) AS links FROM bitly WHERE url = ?');
    $datas->execute(array($url));

    while($data = $datas->fetch()) {
        
        if($data['links'] != 0) {
         
            header("Location: ./?error=true&&message=erreur: url déja raccourcie");
            exit();
        }
    }

    $datas->closeCursor();

    $datas = $bdd->prepare('INSERT INTO bitly(url, shortcut) VALUES(?,?)');
    $datas->execute(array($url, $shortcut));

    header("location: ./?short=".$shortcut."");
    exit();

    $datas->closeCursor();
} 

