<?php

try {
    $pdo = new PDO ('mysql:host=127.0.0.1:3306;dbname=pizzayolo;charset=utf8', 'root', 'pizzayolo');
} catch (\Throwable $e) {
    $pdo = new PDO ('mysql:host=127.0.0.1:3306;dbname=pizzayolo;charset=utf8', 'root', '');
}
