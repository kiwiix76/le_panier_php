<?php
    include "nouveau_panier.php";
    if(isset($_POST["connecter"])) {
        if(isset($_POST["name"]) && isset($_POST["password"])) {
            $json_data = file_get_contents("users.json");
            $data_array = json_decode($json_data, true);
            $connected = false;
            foreach ($data_array as $user) {
                if($user["nom"] == $_POST["name"] && $user["mdp"] == $_POST["password"]) {
                    $connected = true;
                    break;
                }
            }
            if(!$connected) {
                header("Location: index.php?error=mdp");
                session_destroy();
            } else {
                session_start();
                $_SESSION["nom"] = $_POST["name"];
                $_SESSION["panier"] = nouveau_panier();
            }
        }
    } else {
        session_start();
    }

    

    include('./errors.php'); 
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <!-- Méta Donnees -->
    <meta charset="UTF-8">
    <meta name="author" content="Angelica Alamo">
    <meta name="description" content="Vente de fruits">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Titre -->
    <title>Le Fruitier Producteur- Gestion des fruits</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./images/icon.png">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Icons de boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Police de caractères -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Seymour+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body>
    <!------------------- ERRORS PHP ---------------->
     
        
    <header>
        <!------------------- NAVIGATION ---------------->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="./images/pommes.png" class="logo" alt="Logo Le Fruitier Producteur">
                <a class="navbar-brand titre" href="index.php">Producteur de Fruits</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav">
                       <li class="nav-item">
                            <a class="nav-link" href="gestion_fruits.php">Commander</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="panier.php">Panier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Se déconnecter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <!----################----- COOKIES PHP ---######################------------->
       <div class="h2p"><h2>Bonjour  <?=$_SESSION["nom"] ?></h2></div>
<!----################----- FRUITS ---######################------------->
<?php

if(isset($_POST["panier"])) {
    $fruits_data = file_get_contents("fruits.json");
    $fruits = json_decode($fruits_data, true);
    foreach($fruits as $fruit) {
        if(isset($_POST[$fruit["nom"]])) {
            $_SESSION["panier"][$fruit["nom"]] += $_POST[$fruit["nom"]];
        }
    }
    echo "Ajouté au panier avec succès !";
}

?>
        <div class="container text-center">
            <form class="row" method="post">
                
            <?php
                $fruits_data = file_get_contents("fruits.json");
                $fruits = json_decode($fruits_data, true);
                
                foreach($fruits as $fruit) {
            ?>  

                
            <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="images/<?=$fruit["nom"] ?>.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=ucfirst($fruit["nom"]) ?></h5>
                                <p class="card-text">Origine: <?=ucfirst($fruit["origine"]) ?></p>
                                <p class="card-text">Prix: <?=$fruit["prix"] ?> euros</p>
                                <label >Quantité: </label>
                                    <input name="<?=$fruit["nom"] ?>" type="number" value="0" min="0">
                                    <button type="submit" name="panier" class="btn btn-outline-warning">Ajouter au panier</button>
                            </div>
                    </div>
                 </div>

            <?php
                }
            ?>
                <!-- fin fruits -->
            </form>
        </div>



    </main>
    <!------------------- FOOTER ---------------->
    <footer>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand titrefooter" href="index.php">www.le-fruitier.com | Producteur de Fruits</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

    </footer>
</body>

</html>