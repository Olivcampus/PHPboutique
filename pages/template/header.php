<?php  
    
include_once "template/cartfunctions.php";
    $cartCount = getCartItems();

?>
<!DOCTYPE html>

<html lang="fr">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <link href="../assets/fontawesome/css/all.css" rel="stylesheet" type="text/css">

  <link href="../assets/css/styles.css" rel="stylesheet" type="text/css">
  
  

  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo_entreprise.png">
  
  <title>Fatal.dev</title>

</head>

<body>



  <!-- Navbar  -->
  <nav class="navbar navbar-expand-lg bg-dark p-md-3 d-flex flex-column">

    <div class="container d-flex flex-wrap">

      <a class="navbar-brand d-flex align-items-center" href="multidimensional-catalog.php" title="accueil">
        <img src="../assets/images/logo_entreprise.png" alt="logo" class="logo_fatal_dev_header">
      </a>

      <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" class="bi bi-three-dots "
            viewBox="0 0 18 18">
            <path
              d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" />
          </svg>
        </span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

        <div class="mx-auto"></div>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="actifMenu nav-link text-white" href="../pages/multidimensional-catalog.php" title="Accueil">Accueil</a>
            <a href="cart.php" style="text-decoration: none " class=" text-white">Mon Panier (<?php echo $cartCount ?> <i class="fa-solid fa-basket-shopping "></i>)</a>
          </li>
        </ul>

      </div>

    </div>

  </nav>