<?php
include 'template/header.php';
?>

<?php
$products = [
    "teeshirt" => array(
        "name" => "Teeshirt fatal Dev",
        "price" => "19,90€",
        "weight" => "150",
        "discount" => NULL,
        "picture_url" => "<img src= /assets/images/t-shirt-fatal.png>",
    ),
    //var_dump($teeshirt); pour tester/afficher une variable pour debug.

    "poster" => array(
        "name" => "poster",
        "price" => "22,90€",
        "weight" => "120",
        "discount" => NULL,
        "picture_url" => "<img src= /assets/images/poster.jpg>",
    ),

    "tapisSouris" => array(
        "name" => "tapis souris fatal Dev",
        "price" => "29,90€",
        "weight" => "250",
        "discount" => "10%",
        "picture_url" => "<img src= /assets/images/tapis-souris.jpg>",
    ),
];

foreach ($products as $value => $product) {
    echo 'product : ' .$value. '<br>';
    foreach ($product as $infos => $valeur) {
        echo $infos. ': ' .$valeur. '<br>';
    }
}
echo '<br><br>';
?>





<?php
include 'template/footer.php';
?>