<?php 
include 'template/header.php';
?>
<body>
    
<?php 
    $idProduct1 = "Teeshirt fatal Dev" ;
    $product1Price = "19,90€";
    $product1photo = "/assets/images/t-shirt-fatal.png" ;
    print '<img src = "'.$product1photo.'" alt = "photo teeshirt"/>';
    print "$product1Price ";
    print  " $idProduct1";
?>

</body>
<?php 
include 'template/footer.php';
?>