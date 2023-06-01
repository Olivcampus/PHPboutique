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
        $promo = $product ["price"] - ($product ["price"]* ($valeur/100) ) ;            
        return $promo ;
        
    }else{
        $promo=NULL;
        return $promo;        
    }
    }

    function calculPrice($product, $discount, $valeur){
        if($discount != NULL){
            echo formatprice ($product), " € ", " prix avant remise", "<br>";
            echo formatprice($discount), " € ", " prix après remise" ;
           $totalPrice = $discount*$valeur;          
           return $totalPrice; 
        }
        else{
            echo formatprice ($product), " € " ;
            $totalPrice = $valeur *  $product;
            return $totalPrice;      
        }  
    }

    function calculTVA ($product, $productHT){
            $tva = $product-  $productHT;
            return $tva;

    }
?>