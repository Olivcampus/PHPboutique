<?php 
include_once 'template/header.php';
include_once 'template/my-functions.php';
include_once 'template/alert.php';
include_once 'template/ClassAddCart.php';

$total = 0;

$totalWeight = 0;
$cart=new cart();
$product1 = new Product($_POST['productId'], $_POST['quantity']);
$cart->addToCart($product1);
// var_dump($cart);
$shopping= new ShoppingCart($test);
$shopping->DisplayCart($test, $cart);
// var_dump($shopping);