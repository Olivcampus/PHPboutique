<?php
session_start();
include_once 'template/header.php';
include_once 'template/my-functions.php';
include_once 'template/cartfunctions.php';
include_once 'template/alert.php';
 var_dump($_SESSION);
if (isset($_POST['product']) && isset($_POST['quantity']) && isset($_POST['action'])) {
    $productKey = $_POST['product'];
    $quantity = $_POST['quantity'];
    $action = $_POST['action'];

    if ($action === "add") {
        addToCart($productKey, $quantity);
    }

    if ($action === "update") {
        updateCart($productKey, $quantity);
    }
}

if (isset($_GET['delete'])) {
    $productKey = $_GET['delete'];
    removeFromCart($productKey);
}

$cart = getCart();

$total = getCartTotal($cart);

$totalWeight = WeightTotal ($cart);

?>
<?php if (isset($_GET['delete'])) : ?>
    <?php echo getAlert('Le produit <strong>' . $_GET['delete'] . '</strong> a été supprimé de votre panier.', 'error'); ?>
<?php endif; ?>
<?php if (empty($cart)) : ?>
    <?php echo getAlert('Votre panier est vide.', 'success'); ?>
<?php else : ?>
    <form method="post" action="cart.php">
        <input type="hidden" name="action" value="update">

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
                                            <?php foreach ($cart as $item) : ?>
                                                <input type="hidden" name="product[]" value="<?php echo $item['id'] ?>">
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="<?php echo $item['picture_url'] ?> " class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted"><?php echo $item['name'] ?></h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input id="form1" min="0" name="quantity[]" value="<?php echo $item['quantity'] ?>" type="number" class="form-control form-control-sm" />
                                                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <?php $item['total'] = calculPrice($item['price'], $item['discount'], $item['quantity']) ?>
                                                        <h6 class="mb-0"><?php echo "Prix total : ", formatprice($item['total']), " € " ?></h6>                      
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-6">
                                                        <form method="post" action="cart.php?delete=<?php echo $item['id'] ?>">
                                                            <button type="submit" class="btn btn-dark btn-block btn-lg " data-mdb-ripple-color="dark" name="reset" value="reset ">
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
    </form>
<?php endif; ?>
<script src="../assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
<?php
include 'template/footer.php';
?>