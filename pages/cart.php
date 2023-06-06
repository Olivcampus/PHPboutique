<?php
include_once 'template/header.php';
include_once 'template/my-functions.php';
include_once 'template/cartfunctions.php';
include_once 'template/alert.php';
// unset($_SESSION['cart']);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
if (isset($_POST['addproduct'])) {
    addToCart($_POST['productId'], $_POST['quantity'],false);

    if ($_POST['name'] === "update") {
        updateCart($_POST['productId'], $_POST['quantity']);
    }
}
if (isset($_POST['delete']) && isset($_POST['productId'])) { removeFromCart($_POST['productId']); }

if (isset($_POST['quantity'])){ $_POST['quantity'] == "0" ? removeFromCart($_POST['productId']) : addToCart($_POST['productId'], $_POST['quantity'], true); }

if (isset($_POST['modifQuantity'])) {
    if (isset($_POST['lessQuantity'])) { $_POST['lessQuantity'] == "0" ? removeFromCart($_POST['productId']) : addToCart($_POST['productId'], $_POST['lessQuantity'], true); $_POST['quantity']=$_POST['lessQuantity'];}
    if (isset($_POST['moreQuantity'])) { $_POST['moreQuantity'] == "0" ? removeFromCart($_POST['productId']) : addToCart($_POST['productId'], $_POST['moreQuantity'], true); $_POST['quantity']=$_POST['moreQuantity']; }
}

$modifQuantity = 1;
$arrProduct = getCart($bdd);
$total = getCartTotal($arrProduct,$_POST['quantity'],);
$totalWeight = WeightTotal($arrProduct);

?>
<?php if (isset($_GET['delete'])) : ?>
    <?php echo getAlert('Le produit <strong>' . $_GET['delete'] . '</strong> a été supprimé de votre panier.', 'error'); ?>
<?php endif; ?>
<?php if (empty($_SESSION['cart'])) : ?>
    <?php echo getAlert('Votre panier est vide.', 'success'); ?>
<?php else : ?>
    

        <section class="h-100 h-custom" style="background-color: #000;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-lg-8">
                                        <div class="p-5">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black">Panier</h1>
                                            </div>
                                            <?php foreach ($arrProduct as $item) : ?>
                                                <input type="hidden" name="productId" value="<?php echo $item['id'] ?>">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="<?php echo $item['picture_url'] ?> " class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted"><?php echo $item['name'] ?></h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                    <?php 
                                                        if(!empty($_SESSION['cart'])) 
                                                        {
                                                            foreach($_SESSION['cart'] as $product) 
                                                            {
                                                                $quantity = $product['quantity'];
                                                            }
                                                        }
                                                    
                                                    ?>
                                                    <form method="post" action="cart.php">
                                                        <input class="form-control form-control-sm" type="hidden" name="lessQuantity" value="<?= $quantity - $modifQuantity ?>">
                                                        <input type="hidden" name="productId" value="<?= $item['id'] ?>">
                                                        <input type="hidden" name="price" value="<?= $item['price'] ?>">
                                                        <button class="btn btn-link px-2" type="submit" name="modifQuantity" value="modifQuantity"> <i class="fas fa-minus"></i> </button>  
                                                    </form>
                                               
                                                    <form action="cart.php" method="POST">
                                                        <input class="form-control form-control-sm px-2" type="number" name="quantity" value="<?= $quantity ?>">
                                                        <input type="hidden" name="productId" value="<?= $item['id'] ?>">
                                                        <input type="hidden" name="price" value="<?= $item['price'] ?>">
                                                    </form>
                                                       
                                                    <form action="cart.php" method="POST">
                                                        <input class="form-control form-control-sm" type="hidden" name="moreQuantity" value="<?= $quantity + $modifQuantity ?>">
                                                        <input type="hidden" name="productId" value="<?= $item['id'] ?>">
                                                        <input type="hidden" name="price" value="<?= $item['price'] ?>">
                                                        <button class="btn btn-link px-2" type="submit" name="modifQuantity" value="modifQuantity"> <i class="fas fa-plus"></i> </button>           
                                                    </form>
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <?php $itemtotal = calculPrice($item['price'], $item['discount'], $quantity) ?>
                                                        <h6 class="mb-0"><?php echo "Prix total : ", formatprice($itemtotal), " € " ?></h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-6">
                                                        <form method="post" action="cart.php">
                                                            <input type="hidden" name='productId' value="<?= $item['id']?>"/>
                                                            <button type="submit" class="btn btn-dark btn-block btn-lg " data-mdb-ripple-color="dark" name="delete">
                                                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i></a>
                                                            </button>

                                                        </form>
                                                    </div>
                                                </div>

                                                <hr class="my-4">
                                            <?php endforeach; ?>
                                            <div class="pt-5">
                                                <h6 class="mb-0"><a href="multidimensional-catalog.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 bg-grey">
                                        <div class="p-5">
                                            <h3 class="fw-bold mb-5 mt-2 pt-1 text-dark">résumé</h3>

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase text-dark">Prix HT</h5>
                                                <h5><?php echo priceExcludingVAT($total), " €" ?></h5>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase text-dark">TVA</h5>
                                                <h5><?php echo (calculTVA(formatprice($total), priceExcludingVAT($total))), " €" ?></h5>

                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase text-dark">Total panier </h5>
                                                <h5><?php echo  formatprice($total), "€" ?></h5>
                                            </div>
                                            <div class="mb-4 pb-2">
                                                <select name="transporteur">
                                                    <?php if (isset($_POST['transporteur'])) { ?>
                                                        <option value="<?php $_POST['transporteur'] ?>" selected><?php echo formatprice($_POST['transporteur']), " €" ?></option>
                                                    <?php } else { ?>
                                                        <option value=" <?php $_POST['transporteur'] = 0 ?>" selected>Sélectionner un transporteur</option>
                                                    <?php
                                                    }
                                                    foreach ($transporteur as $key => $data) {
                                                        echo ' <option value="' . $data . '"> ' . $key . '  ' . formatprice($data) . "€ ", ' </option>   ';
                                                    }

                                                    ?>
                                                </select>
                                                <button type="submit" class="btn btn-dark btn-block btn-lg" value="add_transporteur" data-mdb-ripple-color="dark" name="add_transporteur">Valider </button>
                                            </div>

                                            <div class="d-flex justify-content-between mb-4">
                                                <h5 class="text-uppercase text-dark">Frais de port </h5>
                                                <h5><?php echo formatprice($fraisPort =  calculFraisDP($totalWeight, $total, $_POST['transporteur'])) ?> €</h5>
                                            </div>
                                            <div class="mb-4 pb-2">

                                            </div>

                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase text-dark">Prix total</h5>
                                                <h5><?php echo formatprice($fraisPort + $total), " €" ?></h5>
                                            </div>

                                            <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Commander</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    
<?php endif; ?>
<script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
<?php
include 'template/footer.php';
?>