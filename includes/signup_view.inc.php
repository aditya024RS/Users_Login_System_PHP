<?php

declare(strict_types = 1);

function signup_inputs() {
    echo '<div class="signup-form-div1">';
        if(isset($_SESSION["signup_data"]["firstname"])) {
            echo '<input type="text" autocomplete="$_COOKIE" name="firstname" id="firstname" placeholder="First name" value="' . $_SESSION["signup_data"]["firstname"] .'">';
        } else {
            echo '<input type="text" autocomplete="$_COOKIE" name="firstname" id="firstname" placeholder="First name">';
        }
        if(isset($_SESSION["signup_data"]["surname"])) {
            echo '<input type="text" autocomplete="$_COOKIE" name="surname" id="surname" placeholder="Surname" value="' . $_SESSION["signup_data"]["surname"] .'">';
        } else {
            echo '<input type="text" autocomplete="$_COOKIE" name="surname" id="surname" placeholder="Surname">';
        }
    echo '</div>';

    if(isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["invalid_username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<input class="its-input" autocomplete="$_COOKIE" type="text" name="username" id="username" placeholder="Mobile number or email address" value="' . $_SESSION["signup_data"]["username"] .'">';
    } else {
        echo '<input class="its-input" autocomplete="$_COOKIE" type="text" name="username" id="username" placeholder="Mobile number or email address">';
    }
    
    echo '<input class="its-input" type="password" name="pwd" id="pwd" placeholder="Password">';

    unset($_SESSION["signup_data"]);
}

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo "<div class='errors'>";
        foreach ($errors as $error) {
            echo " <p class='form-errors'>" . $error . "</p>";
        }
        echo "</div>";

        unset($_SESSION["errors_signup"]);

    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {

        echo " <p class='form-success'>Signup success!</p>";
    }
}