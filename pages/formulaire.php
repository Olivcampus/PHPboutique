<?php
include 'template/header.php';
include 'template/my-functions.php';
?>

<form method="post" action="controller.php">
    Name : <input type="text" name="name" placeholder="Entrez votre nom" /><br />
    Email : <input type="email" name="email" placeholder="Entrer votre Email" /><br />
    <input type="submit" value="Submit" />

<?php
include 'template/footer.php';
?>