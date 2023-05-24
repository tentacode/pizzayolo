<?php

session_start();

require_once('_database.php');

$sql = "SELECT * FROM pizza ORDER BY price DESC";
$pizzas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pizza Yolo - Les meilleures pizzas</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/theme.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once '_navigation.php'; ?>

        <!-- Header -->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Pizza Yolo 🍕🤯</h1>
                    <p class="lead fw-normal text-white-50 mb-0">les meilleures pizzas.</p>
                </div>
            </div>
        </header>
        <!-- Pizza list -->
        <section class="py-5">
            <?php if (isset($_SESSION['flash_message'])): ?>
                <!-- Notification -->
                <div class="container alert alert-success px-4 px-lg-5" role="alert">
                    <?php print $_SESSION['flash_message'] ?>
                </div>
                <?php unset($_SESSION['flash_message']) ?>
            <?php endif; ?>

            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <!-- Début liste pizzas -->
                    <?php foreach ($pizzas as $pizza): ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <?php if ($pizza['discount'] != 0): ?>
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promo !</div>
                                <?php endif; ?>
                                <!-- Product image-->
                                <img class="card-img-top" src="./assets/<?php print $pizza['image'] ?>" alt="Pizzaquipique" />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php print $pizza['name'] ?></h5>
                                        <!-- Product price-->
                                        <?php if ($pizza['discount'] != 0): ?>
                                            <span class="text-muted text-decoration-line-through"><?php print $pizza['price'] ?>€</span>
                                            <?php print $pizza['price'] - $pizza['discount'] ?>€
                                        <?php else: ?>
                                            <?php print $pizza['price'] ?>€
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="add-to-basket.php?pizzaId=<?php print $pizza['id']; ?>">
                                        Ajouter au panier
                                    </a></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Fin liste pizzas -->
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
