<?php
include_once 'template/header.php';
include_once 'template/my-functions.php';
include_once 'template/alert.php';
?>

<section style="background-color: #eee;">
    <?php
        $catalogue=$test->getProducts();
        $donnees = $catalogue->getItems();
        if (count($donnees) > 0) {
            foreach ($donnees as $key => $value) {
        ?>
            <div class="container py-5">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src=" <?= $value->getPictureUrl() ?> " class="w-100" />
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5> <?= $value->getName() ?></h5>
                                        <p><?= $value->getDescription() ?></p>
                                    </div>

                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="text-danger"><?php echo priceExcludingVAT($value->getPrice()), " € HT" ?></h4>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <?php if ($value->getDiscount() != NULL) { ?>
                                                <?php $prixPromo = discountedPrice($value->getPrice(),  $value->getDiscount()) ?>
                                                <h4><?php echo formatprice($prixPromo), " € TTC", "<br>", "au lieu de ", "<br>", formatprice($value->getPrice()), " € TTC" ?></h4>
                                            <?php  } else { ?>

                                                <h4><?php echo formatprice($value->getPrice()), " € TTC" ?></h4>
                                            <?php   } ?>
                                        </div>

                                        <div class="d-flex flex-column mt-4">
                                            <form method="post" action="cart.php">
                                                <div class="block quantity">
                                                    <input type="hidden" name="name" value="<?= $value->getName() ?>">
                                                    <input type="hidden" name="productId" value="<?= $value->getId() ?>">
                                                    <input type="number" name="quantity" value="1" min="1" max="15">
                                                </div>
                                                <button class="btn btn-outline-primary btn-sm mt-2" name="addproduct">
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
            </div>
        <?php }
    } else { ?>
        <div>Pas de produit disponible</div>
    <?php  } ?>
</section>


<?php include 'template/footer.php'; ?>