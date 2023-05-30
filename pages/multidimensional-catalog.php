<?php
include 'template/header.php';
?>

<?php

        $products = [
        "teeshirt" => array(
            "name" => "Teeshirt fatal Dev",
            "price" => 1990,
            "weight" => "150",
            "discount" => NULL,
            "picture_url" => "<img src= /assets/images/t-shirt-fatal.png>",
        ),
        //var_dump($teeshirt); pour tester/afficher une variable pour debug.

        "poster" => array(
            "name" => "poster",
            "price" => 2290,
            "weight" => "120",
            "discount" => NULL,
            "picture_url" => "<img src= /assets/images/poster.jpg>",
        ),

        "tapisSouris" => array(
            "name" => "tapis souris fatal Dev",
            "price" => 2990,
            "weight" => "250",
            "discount" => 10,
            "picture_url" => "<img src= /assets/images/tapis-souris.jpg>",
        ),
    ];

    include 'template/my-functions.php';

    foreach ($products as $value => $product) {

        foreach ($product as $infos => $valeur) {    
            
            if ($infos == "price") {                
                echo 'prixHT : '. priceExcludingVAT($valeur) . ' € '. '<br>'.'prix : '. formatprice($valeur) . ' € '. '<br>'; 
            }

            elseif ($infos =="discount"){ 
                if ($valeur != NULL)   {              
                echo 'PROMO : '. $valeur. ' % '. '<br>'.'prix PROMO : '.discountedPrice($product , $valeur). ' € '. '<br>';
                }elseif ($valeur == NULL){}                
            }
            
            else {echo  $valeur . '<br>';}
        }
    };

?>

<?php
include 'template/footer.php';
?>