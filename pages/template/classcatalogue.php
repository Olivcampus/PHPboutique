<?php
include_once 'template/classBDD.php';
class Catalogue
{
    public array $items;

    public function __construct()
    {
        $bdd = new Bdd();
        $requete = $bdd->prepare('SELECT * FROM product WHERE sell = 1 ');
        $requete->execute();
        $result = $requete->fetchAll();
        $requete->closeCursor();
        if ($result) {
        var_dump($result);
        foreach ($result as $product )
        {
            $item = new Item($product);
            $this->addItems($item);
        }
        }
        return [];
        
    }

    public function addItems(Item $item): Catalogue 
    {
       $this->items[] = $item;
       return $this;
    }

    public function getItems()
    {
        return $this->items;
    }
    
}