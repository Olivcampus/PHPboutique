<?php
include 'template/header.php';
?>
<div class="catalogue d-flex justify-content-center p-5">
    <div>
        <?php

        $products = [
            "teeshirt" => array(
                "name" => "Teeshirt fatal Dev",
                "price" => 1990,
                "weight" => "150",
                "discount" => NULL,
                "picture_url" =>  "/assets/images/t-shirt-fatal.png",
                "description" => "Teeshirt sublime",
            ),
            //var_dump($teeshirt); pour tester/afficher une variable pour debug.

            "poster" => array(
                "name" => "poster",
                "price" => 2290,
                "weight" => "120",
                "discount" => NULL,
                "picture_url" => "/assets/images/poster.jpg",
                "description" => "Poster sublime qui fera briller votre bureau",
            ),

            "tapisSouris" => array(
                "name" => "tapis souris fatal Dev",
                "price" => 2990,
                "weight" => "250",
                "discount" => 10,
                "picture_url" => "/assets/images/tapis-souris.jpg",
                "description" => "le tapis pour la glisse ultime",
            ),
        ];

        include 'template/my-functions.php';

        //  foreach ($products as $product) {

        //           foreach ($product as $infos => $valeur) {

        //                if ($infos == "price") {
        //                  priceExcludingVAT($valeur);
        //                return $valeur;
        //          } elseif ($infos == "discount") {
        //            if ($valeur != NULL) {
        //              discountedPrice($product, $valeur);
        //        } 
        //  }
        //           }
        //     };


        ?>

    </div>

</div>
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
                                        <a href="#!">
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
                                        <h4 class="text-danger"><?php echo priceExcludingVAT($product['price']), " € HT"?></h4>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 ><?php echo discountedPrice($product,$product['discount']) ?></h4>                            
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <h4 ><?php echo formatprice($product['price']), " € TTC" ?></h4>                            
                                    </div>
                                    <h6 class="text-success">10€ frais livraison</h6>
                                    <div class="d-flex flex-column mt-4">
                                        <div class="block quantity">
                                            <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                            Panier
                                        </button>
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