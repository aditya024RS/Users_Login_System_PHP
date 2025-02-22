<?php

declare(strict_types = 1);

function get_profile(object $pdo, int $user_id) {
    $query = "SELECT * FROM profiles
      WHERE id = :id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $user_id);

    $stmt->execute();

    if($stmt->rowCount() == 0) {
      return false;
    }

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}