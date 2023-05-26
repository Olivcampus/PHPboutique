<?php

    function formatprice($valeur){
        $valeur = $valeur / 100;  
        $valeur = sprintf("%.2f", $valeur);  
        return  $valeur;
    }

    function  priceExcludingVAT($valeur){
        $valeur = $valeur/1.2;
        return  formatprice($valeur);
    }

    function discountedPrice($product , $valeur){     
        $promo = $product ["price"]* ($valeur/100)  ;
        $promo = $product ["price"]- $promo;
        return  formatprice($promo);
    }

?>