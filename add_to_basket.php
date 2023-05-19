<?php

session_start();

require_once('src/database.php');

// on récupère l'id de la pizza à ajouter au panier
if (!isset($_GET['pizzaId'])) {
    throw new \RuntimeException('Aucun id de pizza fourni');
}

$pizzaId = $_GET['pizzaId'];

// fetch pizza with a prepared statement
$statement = $pdo->prepare('SELECT * FROM pizza WHERE id = :pizzaId');
$statement->execute(['pizzaId' => $pizzaId]);
$pizza = $statement->fetch(PDO::FETCH_ASSOC);

if ($pizza === false) {
    throw new \RuntimeException('Aucune pizza trouvée pour l\'id '.$pizzaId);
}

// création du panier si il n'existe pas
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [
        'pizzas' => [],
    ];
}

// ajout d'une pizza dans le panier
if (!isset($_SESSION['basket']['pizzas'][$pizzaId])) {
    $_SESSION['basket']['pizzas'][$pizzaId] = $pizza;
    $_SESSION['basket']['pizzas'][$pizzaId]['quantity'] = 1;
} else {
    // si elle existe déjà, on augmente juste la quantité
    $_SESSION['basket']['pizzas'][$pizzaId]['quantity']++;
}

// redirection vers la page de liste des pizzas avec un message de succès
$_SESSION['flash_message'] = 'La pizza '.$pizza['name'].' a bien été ajoutée au panier !';
header('Location: index.php');