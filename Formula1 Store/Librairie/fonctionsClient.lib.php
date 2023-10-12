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

function afficherProduits()
{
    //On se connecte a la bd
    connecter($dbh);
    //On va chercher tous dans la table produit
    $sql = "SELECT * FROM produit";
    //les deux lignes suivantes servent a effectuer la commande sql plus haut tout en étant securiser pour eviter les injection sql
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    //Le foreach va chercher chaques lignes dans la table et les mets chacunes dans une variable
    foreach ($stmt as $ligne) {
        $idProduit = $ligne['idProduit'];
        $nomProduit = $ligne['nomProduit'];
        $quantiteProduit = $ligne['quantite'];
        $prixProduit = $ligne['prix'];
        $descriptionProduit = $ligne['description'];
        $imageProduit = $ligne['imageNom'];

        //On affiche les produits dans le code HTML
        echo <<< HTML
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="$imageProduit" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">$nomProduit</h5>
                        <p class="card-text">$descriptionProduit</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$quantiteProduit Restant</li>
                        <li class="list-group-item">$prixProduit $</li>
                    </ul>
                    <div class="card-body">
                        <label for="qte">Quantité :</label>
                        <input type="number" name="qte" id="qteInput">
                        <a href="#" class="btn btn-success">Ajouter au Panier</a>
                    </div>
                </div>
            </div>
            HTML;
    }
}
