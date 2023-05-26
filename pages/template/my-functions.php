<?php

function formatprice($valeur){
    $valeur = $valeur / 100;  
    $prix = sprintf("%.2f", $valeur);  
    echo  'prix : '. $prix. ' € '. '<br>';
   
   }

?>