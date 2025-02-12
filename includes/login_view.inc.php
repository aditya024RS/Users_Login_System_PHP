<?php

declare(strict_types=1);

function check_login_errors() {
  if (isset($_SESSION["errors_login"])) {
      $errors = $_SESSION["errors_login"];

      echo "<div class='errors'>";
      foreach ($errors as $error) {
          echo "<p class='form-errors'>" . htmlspecialchars($error) . "</p>";
      }
      echo "</div>";

      unset($_SESSION["errors_login"]);
  } else if (isset($_GET["login"]) && $_GET["login"] === "success") {

        echo " <p class='form-success'>Signup success!</p>";
    }
}