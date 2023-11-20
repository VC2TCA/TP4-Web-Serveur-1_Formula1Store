<?php
function connecter(&$dbh)
{
    $serverName = "localhost";
    $dbName = "gameraddict";
    $user = "root";
    $password = "";

    //Le try sert a se connecter a la bd et le catch sert a envoyer un message d'erreur si il y a une erreur
    try {
        //Cette ligne sert a se connecter a la bd en créant un objet PDO
        $dbh = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $msg = 'ERREUR PDO dans ' + $e->getFile() + '<br> L.' + $e->getLine() + ' : ' + $e->getMessage();
        die($msg);
    }
}
