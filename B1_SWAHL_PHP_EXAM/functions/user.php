<?php
require_once __DIR__ . '/db.php';


function registerUser(string $email, string $password, string $login): bool {
    $pdo = getPdo();

    $query = "INSERT INTO users (email, password, login) VALUES (:email, :password, :login)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]),
    'login' => $login
    ]);
}

function registerNews(string $email): bool {
    $pdo = getPdo();

    $query = "INSERT INTO newsletter (email) VALUES (:email)";
    $stmt = $pdo->prepare($query);
    return $stmt->execute([
        'email' => $email
    ]);
}

function getUsers() {
    $pdo = getPdo();

    $query = "SELECT ID, login, email, active, admin FROM users";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNews() {
    $pdo = getPdo();

    $query = "SELECT ID, email FROM newsletter";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}