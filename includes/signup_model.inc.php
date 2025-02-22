<?php

declare(strict_types = 1);

function get_username(object $pdo , string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_id(object $pdo , string $username) {
    $query = "SELECT id FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $pwd, string $firstname, string $surname, string $gender, int $DOBday, int $DOBmonth, int $DOByear) {
    $query = "INSERT INTO users (username, pwd, firstname, surname, gender, DOBday, DOBmonth, DOByear) VALUES (:username, :pwd, :firstname, :surname, :gender, :DOBday, :DOBmonth, :DOByear);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":surname", $surname);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":DOBday", $DOBday);
    $stmt->bindParam(":DOBmonth", $DOBmonth);
    $stmt->bindParam(":DOByear", $DOByear);

    $stmt->execute();
}

function set_profile(object $pdo, int $id) {
    $query = "INSERT INTO profiles (id) VALUES (:id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $id);

    $stmt->execute();
}