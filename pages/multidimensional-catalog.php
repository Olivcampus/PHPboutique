<?php 
include 'template/header.php';
?>

<?php 
    $products =[
        "teeshirt" => array(
            "name" => "Teeshirt fatal Dev",
            "price"=>"19,90€",
            "weight"=>"150",
            "discount"=>NULL,
            "picture_url"=> "<img src= /assets/images/t-shirt-fatal.png>",
        ),
        //var_dump($teeshirt); pour tester/afficher une variable pour debug.

        "poster" => array(
            "name" => "poster",
            "price"=>"22,90€",
            "weight"=>"120",
            "discount"=>NULL,
            "picture_url"=> "<img src= /assets/images/poster.jpg>",
        ),

        "tapisSouris" => array(
            "name" => "tapis souris fatal Dev",
            "price"=>"29,90€",
            "weight"=>"250",
            "discount"=>NULL,
            "picture_url"=> "<img src= /assets/images/tapis-souris.jpg>",
        ),
    ];

?>

<div>
    <h3><?php echo $products["teeshirt"] ["name"]?> </h3>
    <p><?php echo $products["teeshirt"] ["price"]?></p>
    <p><?php echo $products["teeshirt"] ["weight"]?></p>
    <p><?php echo $products["teeshirt"] ["discount"]?></p>
    <p><?php echo $products["teeshirt"] ["picture_url"]?></p>
</div> 
<div>
    <h3><?php echo $products["tapisSouris"] ["name"]?> </h3>
    <p><?php echo $products["tapisSouris"] ["price"]?></p>
    <p><?php echo $products["tapisSouris"] ["weight"]?></p>
    <p><?php echo $products["tapisSouris"] ["discount"]?></p>
    <p><?php echo $products["tapisSouris"] ["picture_url"]?></p>
</div> 

<div>
    <h3><?php echo $products["poster"] ["name"]?> </h3>
    <p><?php echo $products["poster"] ["price"]?></p>
    <p><?php echo $products["poster"] ["weight"]?></p>
    <p><?php echo $products["poster"] ["discount"]?></p>
    <p><?php echo $products["poster"] ["picture_url"]?></p>
</div> 


<?php 
include 'template/footer.php';
?>