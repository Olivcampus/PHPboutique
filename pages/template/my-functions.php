<?php

    function formatprice($valeur){
        $valeur = (int) $valeur / 100;  
        $valeur = sprintf("%.2f", $valeur);  
        return  $valeur;
    }

    function  priceExcludingVAT($valeur){
        $valeur = $valeur/1.2;
        return  formatprice($valeur);
    }

    function discountedPrice($product , $valeur){   
        if ($valeur != null){ 
        $promo = $product - ($product * ($valeur/100) ) ;            
        return $promo ;
        
    }else{
        $promo=NULL;
        return $promo;        
    }
    }

    function calculPrice($product, $discount, $valeur){
        if($discount != NULL){
            $prixdiscount = $product - ($product * ($discount/100));
            echo formatprice ($product), " € ", " prix avant remise", "<br>";
            echo formatprice($prixdiscount), " € ", " prix après remise" ;
           $totalPrice = $prixdiscount*$valeur;          
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