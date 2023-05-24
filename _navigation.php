<?php

function count_pizza_in_basket() {
    $count = 0;
    if (isset($_SESSION['basket'])) {
        foreach ($_SESSION['basket']['pizzas'] as $pizza) {
            $count += $pizza['quantity'];
        }
    }

    return $count;
}

?>
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
                    Le Panier
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?php print count_pizza_in_basket(); ?></span>
                </a>
            </form>
        </div>
    </div>
</nav>