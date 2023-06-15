<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=olivboutique;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

function getProduct($bdd): array
{
  $requete = $bdd->query('SELECT * FROM product WHERE sell = 1 ');
  $requete->execute();
  $result = $requete->fetchAll();
  $requete->closeCursor();
  if ($result) {
    return $result;
  }
  return [];
}

function getProducts($bdd,  int $isAvailable = 1): array
{
  $requete = $bdd->query('SELECT * FROM product WHERE sell =  ' . $isAvailable);
  $requete->execute();
  $result = $requete->fetchAll();
  $requete->closeCursor();
  if ($result) {
    return $result;
  }
  return [];
}

function gettransporteur($bdd): array
{
  $requete = $bdd->query('SELECT * FROM transporteur ');
  $requete->execute();
  $result = $requete->fetchAll();
  $requete->closeCursor();
  if ($result) {
    return $result;
  }
  return false;
}


function addCommand($bdd,int $idUser, $products, $quantities, float $total)
{
  $number_order =  $idUser.random_int(1,50000000);
  $date = new DateTime();
  $test = $date->format("Y-m-d H:i:s");
  $query0 = "INSERT INTO orders (id, date, client_id, total, number_order) VALUES (null, :dateT, $idUser, $total, $number_order)";
  $requete2 = $bdd->prepare($query0);
  $requete2->bindValue(":dateT", $test);

  $requete2->execute();
  $requete2->closeCursor();

  foreach ($products as $product) {
     // var_dump($requete1);
    $query = "INSERT INTO orders_product (id, product_id, quantity, number_order) VALUES (null,:idProduct, :idquantity, $number_order )";
    $requete = $bdd->prepare($query);
    $requete->bindValue(":idProduct", $product, PDO::PARAM_INT);
    $requete->bindValue(":idquantity", $quantities, PDO::PARAM_INT);
    $requete->execute();
    $requete->closeCursor();
  }
}
