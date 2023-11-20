
<?php
include("administration.lib.php");
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
        $fournisseurProduit = $ligne['fournisseur'];
        $quantiteProduit = $ligne['quantite'];
        $consoleProduit = $ligne['console'];
        $prixProduit = $ligne['prix'];
        $descriptionProduit = $ligne['description'];
        $ageProduit = $ligne['age'];
        $imageProduit = $ligne['imageNom'];

        //On affiche les produits dans le code HTML
        echo <<< HTML
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="$imageProduit" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">$nomProduit</h5>
                        <p class="card-text">$descriptionProduit</p>
                        <p class="card-text">Fournisseur : $fournisseurProduit</p>
                        <p class="card-text">Age : $ageProduit</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">$quantiteProduit Restant</li>
                        <li class="list-group-item">$prixProduit $</li>
                    </ul>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Quantité : </span>
                            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <a href="#" class="btn btn-success">Ajouter au Panier</a>
                    </div>
                </div>
            </div>
            HTML;
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'connecter') {
        connexion();
    }
}

function connexion()
{
    //On se connecte à la base de données
    connecter($dbh);
    //On va récupérer les données de tous les usager dans la base de données
    $sql = "SELECT idUsager, password, photoType, photoData FROM usager";
    //On sécurise la requête sql pour éviter les injections SQL
    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    if (isset($_POST['courriel']) && isset($_POST['password'])) {
        $email = $_POST['courriel'];
        $password = $_POST['password'];

        //On va chercher chaques lignes de la table pour les mettres dans des variables
        foreach ($stmt as $ligne) {
            $idUsager = $ligne['idUsager'];
            $mdpUsager = $ligne['password'];
            $imgData = $ligne['photoData'];
            $imgType = $ligne['photoType'];

            if ($email === $idUsager && $password === $mdpUsager) {
                $_SESSION['IdUsager'] = $email;
                $_SESSION['Password'] = $password;
                $_SESSION['ImageProfile'] = $imgData . $imgType;
            }
        }
    }
}

function displayImage()
{
    // echo "La fonction marche";
    // print_r($_SESSION);
    connecter($dbh);

    $courriel = $_SESSION['IdUsager'];
    $sql = "SELECT photoType AND photoData FROM usager WHERE idUsager = :courriel";

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':courriel', $courriel);

    $stmt->execute();

    foreach ($stmt as $ligne) {
        $imageType = $ligne['photoType'];
        $imageData = $ligne['photoData'];

        //Conversion de binaire a base 64
        $base64Image = base64_encode($imageData);

        //Definition du type de contenu approprier
        $contentType = $base64Image . $imageType;

        echo <<< HTML
            <img class="rounded" src="data:$contentType;base64,$base64Image" style="width: 50px; height: 50px;">
        HTML;
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'inscription') {
        inscrire();
    }
}

function inscrire()
{
    //On se connecte à la base de données
    connecter($dbh);

    //On créer les variables qui récupére les valeurs dans les champs du formulaire d'inscription
    $courriel = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $birthDate = $_POST['dateNaissance'];
    $phoneNumber = $_POST['telephone'];

    //On valide l'image est on ajoute les valeurs a la base de données'
    if (count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['ProfilPicture']['tmp_name'])) {
            $imgData = file_get_contents($_FILES['ProfilPicture']['tmp_name']);
            $imgType = $_FILES['ProfilPicture']['type'];

            $sql = "INSERT INTO usager(idUsager, password, prenom, nom, dateNaiss, telephone, photoType, photoData) VALUES(:courriel, :password, :prenom, :nom, :dateNaiss, :telephone, :photoType, :photoData)";

            $stmt = $dbh->prepare($sql);

            $stmt->bindValue(':courriel', $courriel);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':prenom', $name);
            $stmt->bindValue(':nom', $lastname);
            $stmt->bindValue(':dateNaiss', $birthDate);
            $stmt->bindValue(':telephone', $phoneNumber);
            $stmt->bindValue(':photoType', $imgType);
            $stmt->bindValue(':photoData', $imgData);

            try {
                $stmt->execute();



                return true;
            } catch (PDOException $e) {
                $msg = 'ERREUR PDO dans ' + $e->getFile() + '<br> L.' + $e->getLine() + ' : ' + $e->getMessage();
                echo $msg;
            }
        }
    }
}

function afficherSuggestions()
{
    connecter($dbh);
    if (!empty($_POST["nomProduit"])) {

        $sql = $dbh->prepare("SELECT * FROM produit WHERE nomProduit LIKE :recherche");
        $recherche = $_POST['nomProduit'] . "%";
        $sql->bindValue(':recherche', $recherche);
        $sql->execute();

        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($resultat)) {
            echo '<ul id="liste-produit">';
            foreach ($resultat as $produits) {
                echo "<li onClick='selectionnerProduit(\"{$produits['nomProduit']}\", \"{$produits['quantite']}\");'>";
                echo $produits['nomProduit'];
                echo '</li>';
            }
            echo '</ul>';
        }
    }
}
