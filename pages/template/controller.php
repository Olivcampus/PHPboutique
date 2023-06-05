<?php 

  try {
    $bdd= new PDO ('mysql:host=localhost;dbname=olivboutique;charset=utf8', 'root', '');
    return $bdd;
  }catch (Exception $e){
    die ('Erreur : ' .$e->getMessage()); 
  }

?>