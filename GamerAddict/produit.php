<?php
//On inclus le header de la page
include("Includes/header.inc.php");
?>
<div class="container text-center">
    <div class="row">
        <?php
        //Appel de la fonction qui affiche les produits
        afficherProduits();
        ?>
    </div>
</div>
<?php
//On inclus le footer de la page
include("Includes/footer.inc.php");
?>