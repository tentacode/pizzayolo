<?php

session_start();

$basket = $_SESSION['basket'] ?? null;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pizza Yolo - Panier</title>
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
        <!-- Basket form -->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1 class="my-4">Panier</h1>

                <?php if ($basket === null || empty($basket['pizzas'])): ?>
                    <div class="alert alert-info">
                        Votre panier est vide.
                    </div>
                <?php endif; ?>

                <form>
                  <div class="mb-3">
                    <label for="basketTable" class="form-label">Pizzas dans votre panier :</label>
                    <table class="table" id="basketTable">
                      <thead>
                        <tr>
                          <th scope="col">Pizza</th>
                          <th scope="col">Prix unitaire</th>
                          <th scope="col">Quantité</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Repeat this row for each pizza in the basket -->
                        <?php foreach ($_SESSION['basket']['pizzas'] as $pizza): ?>
                        <tr class="pizza-item">
                          <td>
                            <img src="./assets/<?= $pizza['image']; ?>" width="100" class="rounded float-start " alt="<?= $pizza['name']; ?>">
                            <span class="ms-3"><?= $pizza['name']; ?></span>
                          </td>
                          <td class="pizza-price"><?= $pizza['price']; ?></td>
                          <td>
                            <input onchange="updatePrice()" type="number" class="form-control w-25 pizza-quantity" value="<?= $pizza['quantity']; ?>" min="1">
                            <a href="#" class="text-secondary">supprimer</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
            
                  <div class="mb-3">
                    <span class="fs-3">Prix de la commande : <span id="basket-price" class="text-primary fw-bolder">12,50 €</span></span>
                  </div>
            
                  <button type="submit" class="btn btn-primary">Commander !</button>
                </form>
            </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>