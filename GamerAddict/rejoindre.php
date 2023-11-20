<?php
include("Includes/header.inc.php");
?>
<div class="container" style="display: flex; justify-content: center;">
    <form action="mailto:Contact@example.com" method="post" enctype="text/plain" style="width: 650px;">
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Votre nom :</label>
            <div class="col-sm-10">
                <input required placeholder="Votre nom" type="text" name="Nom" class="form-control" id="inputText3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Sujet :</label>
            <div class="col-sm-10">
                <input required placeholder="Votre sujet" type="text" name="Sujet" class="form-control" id="inputText3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Courriel :</label>
            <div class="col-sm-10">
                <input required placeholder="example@gmail.com" type="email" name="Courriel" class="form-control" id="inputText3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Téléphone :</label>
            <div class="col-sm-10">
                <input required placeholder="000-000-0000" type="tel" name="Telephone" class="form-control" id="inputText3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="link-primary col-sm-2 col-form-label">Commentaire :</label>
            <div class="col-sm-10">
                <textarea required placeholder="Votre message" class="form-control" name="Commentaires" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
    </form>
</div>
<?php
include("Includes/footer.inc.php");
?>