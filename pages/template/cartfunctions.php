<?php
include '../pages/template/my-functions.php';
include '../pages/template/catalog-with-keys.php';
include 'template/requete.php';


function addToCart($productKey, $quantity, bool $add)
{
    
    $product = [
        'productId' => $productKey,
        'quantity' => $quantity
    ];

    $exist = false;
    if(!isset($_SESSION['cart'][$productKey]))
    {
        $_SESSION['cart'][$productKey] = $product;
    } else {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($productKey == $_SESSION['cart'][$key]['productId'])
            {
                if($add) { $_SESSION['cart'][$productKey]['quantity'] = $quantity; }

                if(!$add) { $_SESSION['cart'][$productKey]['quantity'] += $quantity; }

                $exist = true;
            }
            if(!$exist) $_SESSION['cart'][$productKey] = $product;
        }
    }
}

function getCart($bdd)
{
    if(!empty($_SESSION['cart'] ))
    {
        $arrProductId = array_column($_SESSION['cart'],'productId');
        foreach($arrProductId as $id) 
        {
            $idProduct = (int)$id;
            $requete = $bdd->query("SELECT * FROM product WHERE id = ".$idProduct.""); 
            $requete->execute();
            $cart[] = $requete->fetch(PDO::FETCH_ASSOC);
            $requete->closeCursor();
        }
        return $cart; 
    }    
    return false;
}

function getCartTotal($cart, $quantity)
{   
    if(!empty($_SESSION['cart'])) {
        $total = 0;
       

        foreach ($cart as $item) {
  
            if ($item['discount'] == NULL) {         
                $total += $item['price'] * $quantity;
                
            } else {
                $total += ($item['total'] - ($item['total'] * ($item['discount'] / 100))) *$quantity;
            }
        }
        return $total;
    }
    return false;
}

function getCartItems()
{
    if (!isset($_SESSION['cart'])) {
        return 0;
    }

    return count($_SESSION['cart']);
}

function updateCart($productKeys, $quantities)
{
    for ($i = 0; $i < count($productKeys); $i++) {

        $productKey = $productKeys[$i];
        $quantity = $quantities[$i];

        // On ajoute (ou remplace) le produit au panier
        $_SESSION['cart'][$productKey] = $quantity;
    }
}

function removeFromCart($productKey)
{
    foreach ($_SESSION['cart'] as $key => $value){
        if ((int)$productKey === (int)$_SESSION['cart'][$key]['productId']) {
            unset($_SESSION['cart'][$key]);
        }
    }
}

function WeightTotal($cart)
{
    if(!empty($_SESSION['cart']))
    {
        $totalWeight = 0;

        foreach ($cart as $item) {
            $totalWeight += $item['weight'];
        }
    
        return $totalWeight;
    }
    return false;
}
