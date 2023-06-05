<?php
include '../pages/template/my-functions.php';
include '../pages/template/catalog-with-keys.php';


function addToCart($productKey, $quantity)
{

    // On initialise le tableau de session s'il n'existe pas encore
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // On ajoute (ou remplace) le produit au panier
    if (isset($_SESSION['cart'][$productKey])) {
        $_SESSION['cart'][$productKey] += $quantity;
    } else {
        $_SESSION['cart'][$productKey] = $quantity;
    }
}

function getCart()
{
    $cartSession = $_SESSION['cart'] ?? [];
    include '../pages/template/controller.php';
    $cart = [];
    $product = $bdd->query('SELECT * FROM product');    
    foreach ($cartSession as $productKey => $quantity) {
        $cart[$productKey] = [
            'id'        => $productKey,
            'name'     => $product['name'],
            'picture_url'     => $product['picture_url'],
            'price'     => $product['price'],
            'quantity'  => $quantity,
            'discount' => $product['discount'],
            'total'     => (int) $product['price'] * $quantity,
            'weight'    => $product['weight'],
            'qteWeight' => (int) $product['weight'] * $quantity,
        ];
    }

    return $cart;
}

function getCartTotal($cart)
{
    $total = 0;
    foreach ($cart as $item) {
        if ($item['discount'] == NULL) {
            $total += $item['total'];
        } else {
            $total += $item['total'] - ($item['total'] * ($item['discount'] / 100));
        }
    }
    return $total;
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

    if (!isset($_SESSION['cart'][$productKey])) {
        return;
    }

    unset($_SESSION['cart'][$productKey]);
}

function WeightTotal($cart)
{
    $totalWeight = 0;

    foreach ($cart as $item) {
        $totalWeight += $item['qteWeight'];
    }

    return $totalWeight;
}
