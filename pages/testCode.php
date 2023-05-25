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
//< if ($chickenRecipesEnabled): <h1>Liste des recettes à base de poulet</h1><?php endif; > //
?>

<?php // switch//
$grade = 10;

switch ($grade) 
{ 
    case 0: // dans le cas où $grade vaut 0
        echo "Tu es vraiment un gros nul !!!";
    break;
    
    case 5: // dans le cas où $grade vaut 5
        echo "Tu es très mauvais";
    break;
    
    case 7: // dans le cas où $grade vaut 7
        echo "Tu es mauvais";
    break;
    
    case 10: // etc. etc.
        echo "Tu as pile poil la moyenne, c'est un peu juste…";
    break;
    
    case 12:
        echo "Tu es assez bon";
    break;
    
    case 16:
        echo "Tu te débrouilles très bien !";
    break;
    
    case 20:
        echo "Excellent travail, c'est parfait !";
    break;
    
    default:
        echo "Désolé, je n'ai pas de message à afficher pour cette note";
}
?>

<?php // ternaire
$userAge = 24;

$isAdult = ($userAge >= 18) ? true : false;

// Ou mieux, dans ce cas précis
$isAdult = ($userAge >= 18);
?>

<?php // tableaux

$user1 = ['Mickaël Andrieu', 'email', 'S3cr3t', 34];

echo $user1[0]; // "Mickaël Andrieu"
echo $user1[1]; // "email"
echo $user1[3]; // 34
?>
<?php // inceptions de tableaux //

$mickael = ['Mickaël Andrieu', 'mickael.andrieu@exemple.com', 'S3cr3t', 34];
$mathieu = ['Mathieu Nebra', 'mathieu.nebra@exemple.com', 'devine', 33];
$laurene = ['Laurène Castor', 'laurene.castor@exemple.com', 'P4ssw0rD', 28];

$users = [$mickael, $mathieu, $laurene];

echo $users[1][1]; // "mathieu.nebra@exemple.com"
?>
</body>
 
</html>