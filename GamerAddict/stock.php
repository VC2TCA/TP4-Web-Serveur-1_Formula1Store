<?php
include("Includes/header.inc.php");
?>
<form class="frmRecherche" method="post" action="stock.php">
    <label for="recherche">
        <h1>Recherchez un produit sur notre site :</h1>
    </label>
    <input class="form-control form-control-lg" type="text" onkeyup="reqAjax()" autocomplete="off" name="recherche" id="recherche" placeholder="Rechercher un produit" aria-label=".form-control-lg example">
    <div id="suggestion"></div>

    <p id="Quantity" class="text-primary"></p>
</form>
<script src="js/app.js" type="text/javascript"></script>
<?php
include("Includes/footer.inc.php");
?>