<?php
function getProducts() {
    return [

"teeshirt" => array(
    "name" => "Teeshirt fatal Dev",
    "price" => 1990,
    "weight" => 150,
    "discount" => NULL,
    "picture_url" => "../assets/images/t-shirt-fatal.png",
    "description" => "Teeshirt sublime",
),
//var_dump($teeshirt); pour tester/afficher une variable pour debug.

"poster" => array(
    "name" => "poster",
    "price" => 2290,
    "weight" => 120,
    "discount" => NULL,
    "picture_url" => "../assets/images/poster.jpg",
    "description" => "Poster sublime qui fera briller votre bureau",
),

"tapisSouris" => array(
    "name" => "tapis souris fatal Dev",
    "price" => 2990,
    "weight" => 250,
    "discount" => 10,
    "picture_url" => "../assets/images/tapis-souris.jpg",
    "description" => "le tapis pour la glisse ultime",
),
];

}

function getProduct($key)
{
    $products = getProducts();

    if ( !isset($products[$key]) ) {
        throw new Exception("Le produit $key n'existe pas");
    }

    return $products[$key];
}

$transporteur = [
    "tnt" => 500 ,
    "LaPoste"=> 1000,
    "DPD" => 750,
    "Chronopost" => 1500,
    "relaisColis" => 0,
]
?>
    