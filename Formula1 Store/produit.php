<?php
//On inclus le header de la page
include("Includes/header.inc.php");
//On inclus le fichier php qui gére les fonctions liées au client
include("Librairie/fonctionsClient.lib.php");
?>
<div class="container text-center">
    <div class="row">
        <?php
        //Appel de la fonction qui affiche les produits
        afficherProduits();
        ?>
    </div>
</div>
<h3>Liste produits</h3>
<?php
//On inclus le footer de la page
include("Includes/footer.inc.php");
?>