<?php
include 'template/header.php';
$products = [
    "teeshirt" => array(
        "name" => "Teeshirt fatal Dev",
        "price" => 1990,
        "weight" => "150",
        "discount" => NULL,
        "picture_url" =>  "../assets/images/t-shirt-fatal.png",
        "description" => "Teeshirt sublime",
    ),
    //var_dump($teeshirt); pour tester/afficher une variable pour debug.

    "poster" => array(
        "name" => "poster",
        "price" => 2290,
        "weight" => "120",
        "discount" => NULL,
        "picture_url" => "../assets/images/poster.jpg",
        "description" => "Poster sublime qui fera briller votre bureau",
    ),

    "tapisSouris" => array(
        "name" => "tapis souris fatal Dev",
        "price" => 2990,
        "weight" => "250",
        "discount" => 10,
        "picture_url" => "../assets/images/tapis-souris.jpg",
        "description" => "le tapis pour la glisse ultime",
    ),
];

include 'template/my-functions.php';
?>



<section style="background-color: #eee;">
    <div class="container py-5">
        <?php
        foreach ($products as $product) {
        ?>
            <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <img src=" <?php echo  $product['picture_url'] ?> " class="w-100" />
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5> <?php echo $product['name'] ?></h5>
                                    <p><?php echo $product['description'] ?></p>
                                </div>

                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 class="text-danger"><?php echo priceExcludingVAT($product['price']), " € HT" ?></h4>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <?php $prixPromo= discountedPrice ($product, $product['discount'])?>
                                        <h4><?php echo formatprice($prixPromo), " €"?></h4>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4><?php echo formatprice($product['price']), " € TTC" ?></h4>                                       
                                    </div>

                                    <div class="d-flex flex-column mt-4">
                                        <form method="post" action="cart.php">
                                            <div class="block quantity">
                                                <input type="number" class="form-control" id="cart_quantity" value="1" min="1" max="5" name="cart_quantity">   
                                                                                                                                                                              
                                                <input type="hidden" id="product_price" value="<?php echo $_SESSION['product_price']= $product['price'] ?>"  name="product_price">
                                                <input type="hidden" id="product_price_HT" value="<?php echo  $_SESSION['product_price_HT']= priceExcludingVAT($product['price'])?>"  name="product_price_HT">
                                                <input type="hidden" id="product_price_discount" value="<?php echo $_SESSION['product_price_discount']= discountedPrice($product, $product['discount'])?>"  name="product_price_discount">
                                                <input type="hidden" id="product_picture" value="<?php echo $_SESSION['product_picture']= $product['picture_url'] ?>"  name="product_picture">
                                                <input type="hidden" id="product_weight" value="<?php echo $_SESSION['product_weight']= $product['weight'] ?>"  name="product_weight">
                                                <input type="hidden" id="name_product" value="<?php echo $_SESSION['name_product']= $product['name'] ?>" name="name_product">
                                            </div>                                            
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="submit" name="addProduct" value="addProduct">
                                                Ajouter au panier
                                            </button>

                                        </form>
                     

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</section>

<?php
include 'template/footer.php';
?>