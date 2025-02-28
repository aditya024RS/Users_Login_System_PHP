<?php

use function PHPSTORM_META\type;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $dob = trim($_POST['dob']);
    $new_password = trim($_POST['new_password']);

    if (empty($username) || empty($dob) || empty($new_password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../forgot_pass.php");
        die();
    }

    $dob_parts = explode('-', $dob);
    if (count($dob_parts) !== 3) {
        $_SESSION['error'] = "Invalid date of birth format.";
        header("Location: ../forgot_pass.php");
        die();
    }
    $DOByear = $dob_parts[0];
    $DOBmonth = $dob_parts[1];
    $DOBday = $dob_parts[2];

    try {
        // Database connection
        require_once 'dbh.inc.php';

        // Check if username and DOB match
        $sql = "SELECT * FROM users WHERE username = :username AND DOBday = :DOBday AND DOBmonth = :DOBmonth And DOByear = :DOByear;";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":DOBday", $DOBday);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":DOBmonth", $DOBmonth);
        $stmt->bindParam(":DOByear", $DOByear);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Hash the new password
            $options = [
            'cost' => 12
            ];
            $newPwd = password_hash($new_password, PASSWORD_BCRYPT, $options);

            // Update the password
            $sql = "UPDATE users SET pwd = :newPwd WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam("newPwd", $newPwd);
            $stmt->bindParam("username", $username);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $_SESSION['success'] = "Password updated successfully.";
            } else {
                $_SESSION['error'] = "Failed to update password.";
            }
        } else {
            $_SESSION['error'] = "Invalid username or date of birth.";
        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

    $stmt = null;
    $pdo = null;

    header("Location: ../forgot_pass.php?resetPassword=success");
    die();
}