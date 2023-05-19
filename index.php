<?php

session_start();

require_once('src/database.php');
require_once('src/pizzas.php');

$statement = $pdo->query('SELECT * FROM pizza');
$pizzas = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pizza Yolo - La carte</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/theme.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Pizza Yolo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">La carte</a></li>
                    </ul>
                    <form class="d-flex">
                        <a href="basket.php" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?= count_pizzas_in_basket() ?></span>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
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
            <!-- Notification -->
            <?php if (isset($_SESSION['flash_message'])): ?>
                <div class="container alert alert-success px-4 px-lg-5" role="alert">
                    <?= $_SESSION['flash_message'] ?>
                </div>
                <?php unset($_SESSION['flash_message']) ?>
            <?php endif; ?>

            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($pizzas as $pizza): ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <?php if ($pizza['discount'] > 0): ?>
                                    <!-- Sale badge-->
                                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promo !</div>
                                <?php endif; ?>
                                <!-- Product image-->
                                <img class="card-img-top" src="./assets/<?= $pizza['image'] ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?= $pizza['name'] ?></h5>
                                        <!-- Product price-->
                                        <?php if ($pizza['discount'] > 0): ?>
                                            <span class="text-muted text-decoration-line-through"><?= euro_price($pizza['price']) ?></span>
                                            <?= discount_price($pizza) ?>
                                        <?php else: ?>
                                            <?= euro_price($pizza['price']) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="add_to_basket.php?pizzaId=<?= $pizza['id'] ?>">Ajouter au panier</a></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
