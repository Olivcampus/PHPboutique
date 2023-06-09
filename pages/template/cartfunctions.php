<?php
include '../pages/template/my-functions.php';
include 'template/requete.php';

function CheckStock($quantity, $arrProduct, $productId)
{
    foreach ($arrProduct as $key => $value) {
        if ($arrProduct['id'] =  $productId) {
            if ($quantity > $value['quantity']) {
                $quantity = $value['quantity'];
                echo "pas assez de stock";
                return $quantity;
            }
        }
    }
}

function addToCart($productKey, $quantity, bool $add)
{
    $exist = false;
    if (!isset($_SESSION['cart'][$productKey])) {
        $_SESSION['cart'][$productKey] =  [
            'productId' => $productKey,
            'quantity' => $quantity
        ];
    } else {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($productKey == $_SESSION['cart'][$key]['productId']) {
                if ($add) {
                    $_SESSION['cart'][$productKey]['quantity'] = $quantity;
                }

                if (!$add) {
                    $_SESSION['cart'][$productKey]['quantity'] += $quantity;
                }

                $exist = true;
            }
            if (!$exist) $_SESSION['cart'][$productKey] =  [
                'productId' => $productKey,
                'quantity' => $quantity
            ];
        }
    }
}

function getCart($bdd)
{
    if (!empty($_SESSION['cart'])) {
        $arrProductId = array_column($_SESSION['cart'], 'productId');
        foreach ($arrProductId as $id) {
            $idProduct = (int)$id;
            $requete = $bdd->query("SELECT * FROM product WHERE id = " . $idProduct . "");
            $requete->execute();
            $cart[] = $requete->fetch(PDO::FETCH_ASSOC);
            $requete->closeCursor();
        }
        return $cart;
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
    foreach ($_SESSION['cart'] as $key => $value) {
        if ((int)$productKey === (int)$_SESSION['cart'][$key]['productId']) {
            unset($_SESSION['cart'][$key]);
        }
    }
}
