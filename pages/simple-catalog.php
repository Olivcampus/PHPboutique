<?php 
include 'template/header.php';
?>

<?php 
$catalogue = array('teeshirt','tapissouris', 'poster');
asort($catalogue);
echo $catalogue [0] ;
echo $catalogue [2] ;
?>

<?php 
include 'template/footer.php';
?>