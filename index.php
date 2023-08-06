
<?php session_start(); ?>
<?php
    $name = null;

    if (isset($_POST['name']) && isset($_POST['password'])) {
        $name = $_POST['name'];
    }

    if (!empty($_POST['name']) && (!empty($_POST['password']))) {
        setcookie('utilisateur', $_POST['name'], time() + 3600);
        $name = $_POST['name'];
    }
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
    <title>Le Fruitier Producteur- Page de connexion</title>
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
    <?php
         include('errors.php');
    ?>
    
       
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
            </div>
        </nav>
    </header>
    <main>
        <!------------------- TITRE ------------------------->

        <h1 class="soustitre">Se connecter</h1>

        <!------------------- FORMULAIRE  ---------------->
        <div class="formbase">
        <?php if ($name): ?>
            <div class="h2p"><h2>Bonjour  <?= htmlentities($name) ?></h2></div>
        <a href="index.php?action=deconnecter">Se déconnecter</a>
       <?php else: ?>
       
       
            <form action="gestion_fruits.php" method="POST">
                <div class="mb-3 ">
                    <label class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="name" placeholder="Entrez votre nom" required>
                   
                </div>
                <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" name="connecter" class="btn btn-primary bouton">Se connecter</button>
            </form>
            <?php endif; ?>
            <img src="images/fruits_divers.png" class="fruits" alt="">
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