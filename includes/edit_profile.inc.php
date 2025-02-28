<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    die();
}

// Include database connection
require_once 'dbh.inc.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $profile_about = $_POST['profile_about'];
    $old_pp = $_SESSION['profile_pic'];

    // Handle profile picture upload
    if (!empty($_FILES['profile_pic']['name'])) {

        $target_dir = "../images/";
        $file_extension = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
        $unique_file_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $unique_file_name;
        $old_pp_des = $target_dir . $old_pp;
        unlink($old_pp_des);
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            $profile_pic = $target_file;
            
        } else {
          $profile_pic = $old_pp;
        }
    } else {
      $profile_pic = $old_pp;
    }

    // Update the profiles table
    $sql = "UPDATE profiles SET profile_pic = :profile_pic, profile_about = :profile_about WHERE id = :id;";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(":profile_pic", $profile_pic);
    $stmt->bindParam(":profile_about", $profile_about);
    $stmt->bindParam(":id", $user_id);

    $stmt->execute();

    if($stmt->rowCount() == 0) {
      $pdo = null;
      $stmt = null;
      header("Location: ../user.php?error=profilenotfound");
      die();
    }

    $pdo = null;
    $stmt = null;

    header('Location: ../user.php?update=sucess');
    die();

} else {
  header("Location: ../user.php?update=failed");
  die();
}