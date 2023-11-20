<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Media/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/50fa168acf.js" crossorigin="anonymous"></script>
    <title>Formula One Store</title>
    <script src="js/app.js"></script>
    <?php
    include("Librairie/fonctionsClient.lib.php");
    session_start();
    ?>
</head>

<body class="bg-dark">
    <header>
        <img src="Media/main-banner2.png" class="img-fluid banner-img">
        <nav class="bg-dark navbar navbar-expand-lg">
            <div class="bg-dark container-fluid">
                <a class="navbar-brand" href="index.php"><img src="Media/logoF1Site.jpg" class="rounded-float-start logo-img"></a>
                <button style="background-color: gray;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: space-between;">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-danger active" aria-current="page" href="produit.php">Produits</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="rejoindre.php">Nous rejoindre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger active" aria-current="page" href="stock.php">Rechercher</a>
                        </li>
                        <li class="nav-item">
                            <a href="panier.php" class="nav-link text-danger"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                    </ul>
                    <?php
                    if (session_status() == 2 && isset($_SESSION['IdUsager'])) {
                        displayImage();
                    }
                    ?>
                    <div class="btn-group dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="connexion.php">Se connecter</a></li>
                            <li><a class="dropdown-item" href="inscription.php">Créer un compte</a></li>
                            <li><a class="dropdown-item" href="deconnecter.php">Se deconnecter</a></li>
                            <li><a class="bg-black link-danger dropdown-item" href="#">Administrateur</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>