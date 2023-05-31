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
        if ($valeur != null){ 
        $promo = $product ["price"]* ($valeur/100)  ;
        $promo = $product ["price"]- $promo;
        echo "PROMO ",$valeur, "% ","<br>", formatprice($promo), " € TTC", "<br>" , "au lieu de : ";
    }else if ($valeur == null){
        $paspromo = "pas de promotion en cours";
        echo $paspromo;          
    }
    }
?>