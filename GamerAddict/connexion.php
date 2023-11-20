<?php
include("Includes/header.inc.php");

$email = isset($_POST['courriel']) ? test_input($_POST['courriel']) : "";
$pwd = isset($_POST['password']) ? test_input($_POST['password']) : "";

if (isset($_POST["connexion"])) {
    if ($_POST["connexion"] == "login") {
        connecter($dbh);
        $sql = "SELECT * FROM usager WHERE idUsager=:idUsager;";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':idUsager', $email);
        $stmt->execute();

        foreach ($stmt as $ligne) {
            $idUsager = $ligne['idUsager'];
            $password = $ligne['password'];
            $photoType = $ligne['photoType'];
            $photoData = $ligne['photoData'];

            if ($_POST["courriel"] == $idUsager && $_POST["password"] == $password) {
                $_SESSION['idUsager'] = $_POST["courriel"];
                $_SESSION['pwd'] = $_POST["password"];
                $_SESSION['logoUser'] = $photoData . $photoType;
                header("Location: connexion.php");
                exit();
            } else {
                print('<p class="mt-3 text-danger">ERREUR : Mot de passe ou identifiant incorrect</p>');
            }
        }
    }
}
?>
<div class="container" style="display: flex; justify-content: center;">
    <form action="connexion.php?action=connecter" method="post" style="width: 650px;">
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Courriel :</label>
            <div class="col-sm-10">
                <input type="email" name="courriel" class="form-control" id="courriel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="link-primary col-sm-2 col-form-label">Mot de passe :</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" id="password">
            </div>
        </div>
        <button type="submit" value="login" name="connexion" class="btn btn-info">Connexion</button>
    </form>
</div>
<?php
include("Includes/footer.inc.php");
?>