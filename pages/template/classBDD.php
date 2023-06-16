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
      foreach ($result as $product) 
      {
        $item = new Item($product);
        $catalogue->addItems($item);
      }  
    
    return $catalogue;
  }
}
