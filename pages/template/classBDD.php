<?php
require_once 'classcatalogue.php';
require_once 'classItem.php';


class Bdd extends PDO
{
  public $db;

  public function __construct()
  {
    $this->connect();
  }

  public function connect()
  {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=olivboutique;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    return $this->db;
  }

  public function getProducts()
  {
    $requete = $this->db->query('SELECT * FROM product WHERE sell = 1 ');
    $requete->execute();
    $result = $requete->fetchAll(PDO::FETCH_ASSOC);
    $requete->closeCursor();

    $catalogue = new Catalogue();
    foreach ($result as $product) {
      $item = new Item($product);
      $catalogue->addItems($item);
    }

    return $catalogue;
  }

  public function getCart(array $arr) : array
  {
    $cart=[];
    $arrProductId = array_column($arr, 'productId');
    foreach ($arrProductId as $id) {
      $requete = $this->db->prepare("SELECT * FROM product WHERE id = :id");
      $requete->bindValue(':id', $id);
      $requete->execute();
      $cart[] = $requete->fetchAll(PDO::FETCH_ASSOC);
      $requete->closeCursor();
    }
    return $cart;
  }

  public function getTransporteur(): array
  {
    $requete = $this->db->query('SELECT * FROM transporteur ');
    $requete->execute();
    $result = $requete->fetchAll();
    $requete->closeCursor();
    if ($result) {
      return $result;
    }
    return false;
  }

  public function addCommand(int $idUser, $products, $quantities, float $total)
  {
    $number_order =  $idUser . random_int(1, 50000000);
    $date = new DateTime();
    $test = $date->format("Y-m-d H:i:s");
    $query0 = "INSERT INTO orders (id, date, client_id, total, number_order) VALUES (null, :dateT, $idUser, $total, $number_order)";
    $requete2 =  $this->db->prepare($query0);
    $requete2->bindValue(":dateT", $test);

    $requete2->execute();
    $requete2->closeCursor();

    foreach ($products as $product) {
      // var_dump($requete1);
      $query = "INSERT INTO orders_product (id, product_id, quantity, number_order) VALUES (null,:idProduct, :idquantity, $number_order )";
      $requete =  $this->db->prepare($query);
      $requete->bindValue(":idProduct", $product, PDO::PARAM_INT);
      $requete->bindValue(":idquantity", $quantities, PDO::PARAM_INT);
      $requete->execute();
      $requete->closeCursor();
    }
  }
}
