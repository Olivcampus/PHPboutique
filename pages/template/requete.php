<?php 

try {
  $bdd = new PDO ('mysql:host=localhost;dbname=olivboutique;charset=utf8', 'root', 'root');
}catch (Exception $e){
  die ('Erreur : ' .$e->getMessage()); 
}

function getProduct($bdd): array|false
{
$requete = $bdd->query('SELECT * FROM product'); 
$requete->execute();
$result = $requete->fetchAll();
$requete->closeCursor();
if ($result){
    return $result;
}
return false;
}

function gettransporteur($bdd): array|false
{
$requete = $bdd->query('SELECT * FROM transporteur'); 
$requete->execute();
$result = $requete->fetchAll();
$requete->closeCursor();
if ($result){
    return $result;
}
return false;
}
?>

