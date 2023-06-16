<?php
require_once 'classItem.php';

class Cart
{
    private $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function addToCart($product)
    {
        $this->products[$product->getId()] = $product;
    }

    public function removeFromCart($productId)
    {
        unset($this->products[$productId]);
    }

    public function updateQuantity($productId, $quantity)
    {
        if (isset($this->products[$productId])) {
            $this->products[$productId]->setQuantity($quantity);
        }
    }

    public function getTotalPrice()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getTotalPrice();
        }
        return $total;
    }

    // Ajoutez ici d'autres méthodes pour gérer le panier
}

class Product
{
    private int $id;
    private int $quantity;

    public function __construct($id, $quantity)
    {
        $this->setId($_POST['productId'])
            ->setQuantity($_POST['quantity']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}

class ShoppingCart
{
    public $db;
    public $cart;
    public $idProduct;
    public $quantity;

    public function __construct($db)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $this->db = $db;
    }


    public function DisplayCart($db, $cart)
    {
        if (!empty($cart)) {
            var_dump($cart);
            foreach ($cart as $id) {
                $idProduct = $id;       
                $requete = $db->query("SELECT * FROM product WHERE id = " . $idProduct . "");
                $requete->execute();
                $result = $requete->fetch(PDO::FETCH_ASSOC);
                $requete->closeCursor();
                $cart = new Catalogue();
                foreach ($result as $product) {
                    $item = new Item($product);
                    $cart->addItems($item);
                }
            }
            return $cart;
        }
    }
}
