<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $firstname = trim($_POST["firstname"]);
    $surname = trim($_POST["surname"]);
    $gender = $_POST["gender"];
    $DOBday = $_POST["DOBday"];
    $DOBmonth = $_POST["DOBmonth"];
    $DOByear = $_POST["DOByear"];

    try {
        
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_ctrl.inc.php';

        // Error Handler
        $errors = [];

        if (is_input_empty($username, $pwd, $firstname, $surname, $gender, $DOBday, $DOBmonth, $DOByear)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_username_invalid($username)) {
            $errors["invalid_username"] = "Invalid Username!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already registered!";
        }

        require_once 'config_session.inc.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "username" => $username,
                "firstname" => $firstname,
                "surname" => $surname,
                "gender" => $gender,
                "DOBday" => $DOBday,
                "DOBmonth" => $DOBmonth,
                "DOByear" => $DOByear,
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../sign_up.php");
            die();
        }

        create_user($pdo, $username, $pwd, $firstname, $surname, $gender, $DOBday, $DOBmonth, $DOByear);

        $result = get_id($pdo, $username);
        create_profile($pdo, $result['id']);

        header("Location: ../sign_up.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../sign_up.php");
    die();
}