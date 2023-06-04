<?php
  // Vérifie qu'il provient d'un formulaire
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    
    if (!isset($name)){
      die("S'il vous plaît entrez votre nom");
    }
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
      die("S'il vous plaît entrez votre adresse e-mail");
    }
    
    print "Salut " . $name . "!, votre adresse e-mail est ". $email;
  }
?>