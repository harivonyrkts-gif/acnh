<?php
$host = '127.0.0.1';
$nom_base = 'acnh';
$utilisateur = 'root';
$mot_de_passe = '';

$pdo = new PDO(
    "mysql:host=$host;dbname=$nom_base;charset=utf8mb4",
    $utilisateur,
    $mot_de_passe,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
);
