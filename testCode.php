<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php echo "Ceci est du texte"; ?>

<p>Aujourd'hui nous sommes le <?php echo date('d/m/Y h:i:s'); ?>.</p>
<?php 
$userAge = 17;
$userAge = 23;
$userAge = 55;
$fullname = "Mathieu Nebra";
$email = 'mathieu.nebra@exemple.com';
$variable = "Mon \"nom\" est Mathieu";
$variable = 'Je m\'appelle Mathieu';
$isAuthor = true;
$isAdministrator = false;
echo 'Bonjour ' . $fullname . ' et bienvenue sur le site !'; // méthode d'affichage la plus utilisé car "lisible"//
$number = 10;
$result = ($number + 5) * $number; // $result prend la valeur 150
$isEnabled = true;
if ($isEnabled == true) {
    echo "Vous êtes autorisé(e) à accéder au site ✅";
}
else {
    echo "Accès refusé ❌ ";
}
?>
</body>
</html>