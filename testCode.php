<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>

<?php 
// $ pour dire que c'est une variable (int, float ...)//
$userAge = 17;
$userAge = 23;
$userAge = 55;
$fullname = "Olivier HIMBLOT";
$email = 'olivier.himblot@le-camppus-numerique.fr';
$variable = "Mon \"nom\" est Mathieu"; // \" où \' pour afficher les guillemets sur un site //
$variable = 'Je m\'appelle Mathieu';
$isAuthor = true;
$isAdministrator = false;
echo 'Bonjour ' . $fullname . ' et bienvenue sur le site !'; // méthode d'affichage la plus utilisé car "lisible"//
$number = 10;
$result = ($number + 5) * $number; // $result prend la valeur 150 //
$isEnabled = true;
if ($isEnabled == true) { //écrire un boolean//
    echo "Vous êtes autorisé(e) à accéder au site ✅";
}
elseif ($isEnabled == false){ // peut s'écrire aussi (! $isEnabled) //
    echo "Accès refusé ❌ ";
}
else {
    echo "j'ai pas tout compris";
}
?>

</body>
 
</html>