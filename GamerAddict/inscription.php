<?php
include("Includes/header.inc.php");
// include("Librairie/fonctionsClient.lib.php");

$courriel = isset($_POST['email']) ? test_input($_POST['email']) : "";
$password = isset($_POST['password']) ? test_input($_POST['password']) : "";
$name = isset($_POST['name']) ? test_input($_POST['name']) : "";
$lastname = isset($_POST['lastname']) ? test_input($_POST['lastname']) : "";
$birthDate = isset($_POST['dateNaissance']) ? test_input($_POST['dateNaissance']) : "";
$telephone = isset($_POST['telephone']) ? test_input($_POST['telephone']) : "";
?>
<div class="container" style="display: flex; justify-content: center;">
    <form action="inscription.php?action=inscription" method="post" enctype="multipart/form-data" style="width: 650px;">
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Courriel :</label>
            <div class="col-sm-10">
                <input type="email" name="email" placeholder="Entre ton adresse mail" maxlength="40" class="form-control" id="courriel">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="link-primary col-sm-2 col-form-label">Mot de passe :</label>
            <div class="col-sm-10">
                <input type="password" name="password" placeholder="Entre ton mot de passe" maxlength="20" class="form-control" id="password">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Votre prénom :</label>
            <div class="col-sm-10">
                <input type="text" name="name" placeholder="Entre ton prénom" maxlength="20" class="form-control" id="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="link-primary col-sm-2 col-form-label">Votre nom :</label>
            <div class="col-sm-10">
                <input type="text" name="lastname" placeholder="Entre ton nom" maxlength="20" class="form-control" id="lastname">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Date de naissance :</label>
            <div class="col-sm-10">
                <input type="date" name="dateNaissance" class="form-control" id="dateNaissance">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="link-primary col-sm-2 col-form-label">Téléphone</label>
            <div class="col-sm-10">
                <input type="tel" name="telephone" maxlength="12" placeholder="000-000-0000" class="form-control" id="telephone">
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Choisir un fichier</label>
            <input class="form-control" name="ProfilPicture" type="file" id="profilPicture">
        </div>
        <button type="submit" name="InscriptionUsager" class="btn btn-info">Créer</button>
        <button type="reset" class="btn btn-info">Annuler</button>
    </form>
</div>
<?php
include("Includes/footer.inc.php");
?>