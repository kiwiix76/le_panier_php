<?php session_start();
class PrixFruitException extends Exception {}
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
             include('./errors.php');
        ?>
    <header>
    <!------------------- NAVIGATION ---------------->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <img src="./images/pommes.png" class="logo" alt="Logo Le Fruitier Producteur">
   <a class="navbar-brand titre" href="index.php">Producteur de Fruits</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
         <!------------------- TITRE ---------------->

    <h1 class="soustitre">Panier</h1>


 <!------------------- FORMULAIRE  BOSSTRAP---------------->
 <div class="dropdown">
    <div id="cart">
        <p><span id="in-cart-items-num">0</span> Articles</p>
    </div>

    <ul id="cart-dropdown" hidden>
        <li id="empty-cart-msg"><a>Votre panier est vide</a></li>
        <li class="go-to-cart hidden"><a href="/panier/">Voir le panier</a></li>
    </ul>
</div>

<table class="table">
    <thead>
        <tr><th>Article</th><th>Quantité</th><th>Prix</th><th>Sous total</th></tr>
        <?php 
          $fruits_data = file_get_contents("fruits.json");
          $fruits = json_decode($fruits_data, true);
          $total = 0;

          function prix_fruit($nom, $fruits) {
            foreach($fruits as $fruit) {
              if ($fruit["nom"] == $nom) {
                return $fruit["prix"];
              }
            }
            throw new PrixFruitException("Prix de ".$nom." non trouvé");
          }

          foreach($_SESSION["panier"] as $fruit => $quantite) {
            if ($quantite > 0) {
              $prix = prix_fruit($fruit, $fruits);
              $soustotal = $quantite * $prix;
              $total += $soustotal;
            ?>
              <tr><td><?= $fruit ?></td><td><?= $quantite ?></td><td><?=$prix ?></td><td><?= $soustotal ?></td></tr>
            <?php
            }
          }
        ?>
        <tr><th></th><th></th><th>Total :</th><th><?=$total ?></th></tr>
    </thead>
    <tbody id="cart-tablebody"></tbody>
</table>


<button id="confirm-command">Passer la commande</button>

</main>
 <!------------------- FOOTER ---------------->
    <footer>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   <a class="navbar-brand titrefooter" href="index.php">www.le-fruitier.com | Producteur de Fruits</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
  </div>
</nav>

    </footer>
</body>
</html>